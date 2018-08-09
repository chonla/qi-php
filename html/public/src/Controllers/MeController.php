<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Qi\Models\User as User;

class MeController {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function updatePassword(Request $request, Response $response, array $args) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];

        $user_data = $request->getParsedBody();

        $this->applyPassword($requester, $user_data);
        $requester->save();

        $r = $response->withStatus(200);
        return $r;
    }

    private function applyPassword(User $user, array $data) {
        if (array_key_exists('pwd', $data)) {
            $this->auth = $this->c->get('auth');
            $user->pwd = $this->auth->generateHash(filter_var($data['pwd'], FILTER_SANITIZE_STRING));
        }
    }
}