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
}