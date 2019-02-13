<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\Post as Post;
use \Qi\Models\User as User;

class PostController {
    private $c;
    private $paginator;
    private $posts;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
        $this->paginator = $c->get('paginator');
        $this->posts = $c->get('posts');
        $this->postService = $c->get('post-service');
    }

    public function all(Request $request, Response $response, array $args) {
        $req_data = $request->getQueryParams();

        $pagination = $this->paginator->paginate($req_data);
        $posts = $this->posts->page($pagination);

        $r = $response->withJson($posts);
        return $r;
    }

    public function one(Request $request, Response $response, array $args) {
        $id = $args['id'];
        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        $r = $response->withJson($post);
        return $r;
    }

    public function add(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $post_data = $request->getParsedBody();

        $post = new Post;
        $this->apply($post, $post_data);
        $post->author = $requester->id;
        $post->save();

        $post = $this->postService->publish($post);

        $r = $response
            ->withHeader('Location', sprintf('/posts/%d', $post->id))
            ->withStatus(201)
            ->withJson($post);
        return $r;
    }

    public function addAsDraft(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $post_data = $request->getParsedBody();

        $post = new Post;
        $this->apply($post, $post_data);
        $post->author = $requester->id;
        $post->save();

        $post = $this->postService->draft($post);

        $r = $response
            ->withHeader('Location', sprintf('/posts/%d', $post->id))
            ->withStatus(201)
            ->withJson($post);
        return $r;
    }

    public function replace(Request $request, Response $response, array $args) {
        $id = $args['id'];
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
        $id = $args['id'];
        $post_data = $request->getParsedBody();

        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        $this->applyPartially($post, $post_data);
        $post->save();

        $r = $response->withStatus(200);
        return $r;
    }

    public function delete(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $id = $args['id'];

        $post = Post::find($id);
        if ($post === null) {
            return $this->c->get('page404')($request, $response);
        }
        if ($post->author !== $requester->id && $requester['level'] !== User::ADMIN) {
            return $response->withStatus(403);
        }
        $post->delete();

        $r = $response->withStatus(200);
        return $r;
    }

    private function apply(Post $post, array $data) {
        $post->title = filter_var($data['title'], FILTER_UNSAFE_RAW);
        $post->body = filter_var($data['body'], FILTER_UNSAFE_RAW);
    }

    private function applyPartially(Post $post, array $data) {
        if (array_key_exists('title', $data)) {
            $post->title = filter_var($data['title'], FILTER_UNSAFE_RAW);
        }
        if (array_key_exists('body', $data)) {
            $post->body = filter_var($data['body'], FILTER_UNSAFE_RAW);
        }
    }
}