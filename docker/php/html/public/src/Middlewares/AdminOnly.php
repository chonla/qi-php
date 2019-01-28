<?php
namespace Qi\Middlewares;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Qi\Models\User as User;

class AdminOnly {
    public function __invoke(Request $request, Response $response, callable $next) {
        $payload = $request->getAttribute('jwt_payload');
        $requester = $payload['requester'];
        if ($requester->isAdmin()) {
            return $next($request, $response);
        }
        return $response->withStatus(403);
    }
}