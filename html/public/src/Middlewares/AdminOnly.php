<?php
namespace Qi\Middlewares;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Qi\Models\User as User;

class AdminOnly {
    public function __invoke(Request $request, Response $response, callable $next) {
        $requester = $request->getAttribute('jwt_payload');
        if ($requester['level'] !== User::ADMIN) {
            return $response->withStatus(403);
        }

        return $next($request, $response);
    }
}