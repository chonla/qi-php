<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;

class PostController {
    private $db;

    function __construct(\Slim\Container $c) {
        $this->db = $c->get('db');
    }

    public function all(Request $request, Response $response, array $args) {
        $r = $response->withJson($this->db->table('posts')->get());
        return $r;
    }

    public function one(Request $request, Response $response, array $args) {
        $id = $args["id"];
        $r = $response->withJson($this->db->table('posts')->find($id));
        return $r;
    }
}