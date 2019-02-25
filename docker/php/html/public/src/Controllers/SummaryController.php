<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\Post as Post;

class SummaryController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function all(Request $request, Response $response, array $argsr) {
        $post = new Post();
        $count = $post->count();
        $data = [
            'posts' => [
                'count' => $count
            ]
        ];
        $r = $response->withJson($data);
        return $r;
    }
}