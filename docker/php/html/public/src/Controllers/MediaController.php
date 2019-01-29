<?php

namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\Media as Media;
use \Qi\Models\User as User;

class MediaController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
        $this->media = $c->get('media');
        $this->uploader = $c->get('file');
    }

    public function add(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $media_data = $request->getBody();

        $filename = $this->uploader->upload($media_data);

        echo $filename;


        // $media = new Media;
        // $this->apply($media, $media_data);
        // $media->author = $requester->id;
        // $media->save();

        $r = $response
            ->withHeader('Location', sprintf('/media/%d', $media->id))
            ->withStatus(201);
        return $r;
    }
}