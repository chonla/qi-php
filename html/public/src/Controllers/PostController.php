<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\Post as Post;

class PostController {
    private $db;

    function __construct(\Slim\Container $c) {
        $this->db = $c->get('db');
    }

    public function all(Request $request, Response $response, array $args) {
        $r = $response->withJson(Post::all());
        return $r;
    }

    public function one(Request $request, Response $response, array $args) {
        $id = $args["id"];
        $r = $response->withJson(Post::find($id));
        return $r;
    }

    public function add(Request $request, Response $response, array $args) {
        $post_data = $request->getParsedBody();

        $post = new Post;
        $post->title = filter_var($post_data['title'], FILTER_SANITIZE_STRING);
        $post->body = filter_var($post_data['body'], FILTER_SANITIZE_STRING);
        $post->author = 1;
        $post->featured_image = 0;
        $post->save();

        $r = $response
            ->withHeader('Location', sprintf('/posts/%d', $post->id))
            ->withStatus(201);
        return $r;
    }
}