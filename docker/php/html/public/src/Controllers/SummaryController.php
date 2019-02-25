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
        $published_count = $post->where('status', 'published')->count();
        $draft_count = $post->where('status', 'draft')->count();
        $data = [
            'posts' => [
                'published_count' => $published_count,
                'draft_count' => $draft_count
            ]
        ];
        $r = $response->withJson($data);
        return $r;
    }
}