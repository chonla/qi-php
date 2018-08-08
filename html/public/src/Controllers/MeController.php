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
        $requester = $request->getAttribute('jwt_payload');

        $id = $requester['id'];
        $user_data = $request->getParsedBody();

        $user = User::find($id);
        if ($user === null) {
            return $this->c->get('page404')($request, $response);
        }
        $this->password_apply($user, $user_data);
        $user->save();

        $r = $response->withStatus(200);
        return $r;
    }

    private function password_apply(User $user, array $data) {
        if (array_key_exists('pwd', $data)) {
            $this->auth = $this->c->get('auth');
            $user->pwd = $this->auth->generateHash(filter_var($data['pwd'], FILTER_SANITIZE_STRING));
        }
    }
}