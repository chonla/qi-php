<?php
namespace Qi\Middlewares;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Jwt {
    public function get() {
        return new \Tuupola\Middleware\JwtAuthentication([
            "path" => "/",
            "ignore" => ["/login"],
            "relaxed" => ["localhost", "127.0.0.1"],
            "attribute" => "decoded_payload",
            "secret" => getenv("JWT_SECRET"),
            "error" => function ($response, $arguments) {
                $data["status"] = "error";
                $data["message"] = $arguments["message"];
                return $response
                    ->withHeader("Content-Type", "application/json")
                    ->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
            }
        ]);
    }
}