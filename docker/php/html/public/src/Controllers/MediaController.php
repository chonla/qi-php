<?php

namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\Media as Media;
use \Qi\Models\User as User;
use \GuzzleHttp\Psr7\LazyOpenStream;

class MediaController {
    private $c;
    private $settings;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
        $this->media = $c->get('media');
        $this->uploader = $c->get('file');
        $this->settings = $this->c->get('settings');
    }

    public function one(Request $request, Response $response, array $args) {
        $id = $args['id'];
        $media = Media::find($id);
        if ($media === null) {
            return $this->c->get('page404')($request, $response);
        }

        $filename = $this->uploader->getUploadedFilePath($media->filename);
        $fileStream = new LazyOpenStream($filename, 'r');
        $r = $response
            ->withHeader('Content-Type', $media->mimetype)
            ->withBody($fileStream);
        return $r;
    }

    public function upload(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $media = $this->uploader->bulkUpload($request, '1', 'photo');

        if (count($media) > 0) {
            $r = $response
                ->withStatus(201)
                ->withJson($media);
            return $r;
        }
        $r = $response
            ->withStatus(400);
        return $r;
    }

    public function add(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $media = $this->uploader->directUpload($request, $requester->id);

        $r = $response
            ->withHeader('Location', sprintf('%s/media/%d', $this->settings['apiBase'], $media->id))
            ->withStatus(201);
        return $r;
    }

    public function delete(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $id = $args['id'];

        $media = Media::find($id);
        if ($media === null) {
            return $this->c->get('page404')($request, $response);
        }
        if ($media->author !== $requester->id && $requester['level'] !== User::ADMIN) {
            return $response->withStatus(403);
        }
        $media->delete();

        $r = $response->withStatus(200);
        return $r;
    }

}