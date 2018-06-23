<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\Post as Post;

class PostController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function all(Request $request, Response $response, array $args) {
        $req_data = $request->getQueryParams();

        $pagination = array_merge([
            "page" => 1,
            "limit" => 10
        ], $req_data);
        if ($pagination["page"] <= 0) {
            $pagination["page"] = 1;
        }
        if ($pagination["limit"] <= 0) {
            $pagination["limit"] = 10;
        }

        $posts = Post::orderBy('id', 'asc')
            ->skip(($pagination["page"] - 1) * $pagination["limit"])
            ->take($pagination["limit"])
            ->get();
        $count = Post::count();
        $page_count = ceil($count / $pagination["limit"]);
        if ($page_count === 0) {
            $page_count = 1;
        }

        $result = [
            "page_count" => $page_count,
            "page" => $pagination["page"],
            "limit" => $pagination["limit"],
            "result" => $posts
        ];
        $r = $response->withJson($result);
        return $r;
    }

    public function one(Request $request, Response $response, array $args) {
        $id = $args["id"];
        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        $r = $response->withJson($post);
        return $r;
    }

    public function add(Request $request, Response $response, array $args) {
        $post_data = $request->getParsedBody();

        $post = new Post;
        $post->featured_image = 0;
        $this->apply($post, $post_data);
        $post->author = 1;
        $post->save();

        $r = $response
            ->withHeader('Location', sprintf('/posts/%d', $post->id))
            ->withStatus(201);
        return $r;
    }

    public function replace(Request $request, Response $response, array $args) {
        $id = $args["id"];
        $post_data = $request->getParsedBody();

        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        $this->apply($post, $post_data);
        $post->save();

        $r = $response->withStatus(200);
        return $r;
    }

    public function update(Request $request, Response $response, array $args) {
        $id = $args["id"];
        $post_data = $request->getParsedBody();

        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        $this->partial_apply($post, $post_data);
        $post->save();

        $r = $response->withStatus(200);
        return $r;
    }

    public function delete(Request $request, Response $response, array $args) {
        $id = $args["id"];
        $post_data = $request->getParsedBody();

        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        $post->delete();

        $r = $response->withStatus(200);
        return $r;
    }

    private function apply(Post $post, array $data) {
        $post->title = filter_var($data['title'], FILTER_SANITIZE_STRING);
        $post->body = filter_var($data['body'], FILTER_SANITIZE_STRING);
        if (array_key_exists('featured_image', $data)) {
            $post->featured_image = $data['featured_image'];
        }
    }

    private function partial_apply(Post $post, array $data) {
        if (array_key_exists('title', $data)) {
            $post->title = filter_var($data['title'], FILTER_SANITIZE_STRING);
        }
        if (array_key_exists('body', $data)) {
            $post->body = filter_var($data['body'], FILTER_SANITIZE_STRING);
        }
        if (array_key_exists('featured_image', $data)) {
            $post->featured_image = $data['featured_image'];
        }
    }
}