<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Firebase\JWT\JWT;

class LoginController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function login(Request $request, Response $response, array $args) {
        $token = JWT::encode(['id' => 1, 'email' => 'chonla@capabilify.com'], getenv("JWT_SECRET"));
     
        return $response->withJson(['token' => $token]);
    }
}
