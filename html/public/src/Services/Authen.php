<?php

namespace Qi\Services;

use \Firebase\JWT\JWT;
use \Qi\Models\Credential as Credential;

class Authen {
    public function login($credential) {
        $user = Credential::where([
            "login" => $credential["login"]
        ])->first();

        list($salt) = explode(".", $user->pwd);
        if ((sprintf("%s.%s", $salt, hash("sha256", sprintf("%s%s", $salt, $credential["pwd"])))) === $user->pwd) {
            return $user;
        }
        return NULL;
    }

    public function generateToken($payload) {
        $token = JWT::encode($payload, getenv("JWT_SECRET"));
        return $token;
    }
}