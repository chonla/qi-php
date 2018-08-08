<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\User as User;

class UserController {
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

        $users = User::orderBy('id', 'asc')
            ->skip(($pagination["page"] - 1) * $pagination["limit"])
            ->take($pagination["limit"])
            ->get();
        $count = User::count();
        $page_count = ceil($count / $pagination["limit"]);
        if ($page_count === 0) {
            $page_count = 1;
        }

        $result = [
            "page_count" => $page_count,
            "page" => $pagination["page"],
            "limit" => $pagination["limit"],
            "result" => $users
        ];
        $r = $response->withJson($result);
        return $r;
    }

    public function one(Request $request, Response $response, array $args) {
        $id = $args['id'];
        $user = User::find($id);
        if ($user === null) {
            return $this->c->get('page404')($request, $response);
        }
        $r = $response->withJson($user);
        return $r;
    }

    public function delete(Request $request, Response $response, array $args) {
        $id = $args['id'];
        $user_data = $request->getParsedBody();

        $user = User::find($id);
        if ($user === null) {
            return $this->c->get('page404')($request, $response);
        }
        $user->delete();

        $r = $response->withStatus(200);
        return $r;
    }

    public function add(Request $request, Response $response, array $args) {
        $user_data = $request->getParsedBody();

        $user = new User;
        $user->displayed_image = 0;
        $this->apply($user, $user_data);
        $user->save();

        $r = $response
            ->withHeader('Location', sprintf('/users/%d', $user->id))
            ->withStatus(201);
        return $r;
    }

    private function apply(User $user, array $data) {
        $user->login = filter_var($data['login'], FILTER_SANITIZE_STRING);
        $user->pwd = filter_var($data['pwd'], FILTER_SANITIZE_STRING);
        $user->display = filter_var($data['display'], FILTER_SANITIZE_STRING);
        if (array_key_exists('displayed_image', $data)) {
            $user->displayed_image = $data['displayed_image'];
        }
    }

}