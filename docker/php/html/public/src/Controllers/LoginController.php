<?php
namespace Qi\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Container;
use \Dflydev\FigCookies\FigResponseCookies;
use \Dflydev\FigCookies\SetCookie;

class LoginController {
    private $c;
    private $auth;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
        $this->auth = $c->get('auth');
    }

    public function login(Request $request, Response $response, array $args) {
        $login_data = $request->getParsedBody();
        if (($user = $this->auth->login($login_data)) !== NULL) {
            $now = (new \DateTime())->getTimestamp();
            $expiresAt = (new \DateTime(sprintf('+%s', $this->c->get('settings')['jwt']['age'])))->getTimestamp();
            $payload = [
                'id' => $user->id, 
                'exp' => $expiresAt,
                'iat' => $now,
            ];
            $token = $this->auth->generateToken($payload);

            return $response->withJson(['token' => $token, 'expiresAt' => $expiresAt]);
        }
        return $response->withStatus(403);
    }
}
