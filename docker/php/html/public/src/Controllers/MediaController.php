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

        $media = $this->uploader->directUpload($request, $requester->id);

        $r = $response
            ->withHeader('Location', sprintf('/media/%d', $media->id))
            ->withStatus(201);
        return $r;
    }
}