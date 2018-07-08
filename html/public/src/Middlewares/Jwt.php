<?php
namespace Qi\Middlewares;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Jwt {
    private $c;

    function __construct(\Slim\Container $c) {
        $this->c = $c;
    }

    public function get() {
        $public_scope = $this->c->get('settings')['public_scope'];
        return new \Tuupola\Middleware\JwtAuthentication([
            "path" => "/",
            "ignore" => ["/login"],
            "relaxed" => ["localhost", "127.0.0.1"],
            "attribute" => "jwt_payload",
            "secret" => getenv("JWT_SECRET"),
            "error" => function ($response, $arguments) {
                $data["status"] = "error";
                $data["message"] = $arguments["message"];
                return $response
                    ->withHeader("Content-Type", "application/json")
                    ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            },
            "before" => function ($request, $arguments) use($public_scope) {
                $payload = $request->getAttribute('jwt_payload');
                if (!array_key_exists('scope', $payload)) {
                    $payload['scope'] = [];
                }
                $payload['scope'] = array_merge($payload['scope'], $public_scope);
                return $request->withAttribute('jwt_payload', $payload);
            }
        ]);
    }
}