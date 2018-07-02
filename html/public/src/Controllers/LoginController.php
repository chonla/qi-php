<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Firebase\JWT\JWT;
use \Qi\Models\User as User;

class LoginController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function login(Request $request, Response $response, array $args) {
        $login_data = $request->getParsedBody();
        $user = User::where([
            "login" => $login_data["login"]
        ])->first();

        list($salt) = explode(".", $user->pwd);
        if ((sprintf("%s.%s", $salt, hash("sha256", sprintf("%s%s", $salt, $login_data["pwd"])))) === $user->pwd) {
            $token = JWT::encode([
                'id' => $user->id, 
                'display' => $user->display, 
                'display_image' => $user->displayed_image
            ], getenv("JWT_SECRET"));
            return $response->withJson(['token' => $token]);
        }
        return $response->withStatus(403);
    }
}
