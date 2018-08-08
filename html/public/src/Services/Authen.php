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
        if ($this->hash($credential["pwd"], $salt) == $user->pwd) {
            return $user;
        }
        return NULL;
    }

    public function hash($pwd, $salt) {
        return sprintf("%s.%s", $salt, hash("sha256", sprintf("%s%s", $salt, $pwd)));
    }

    public function generateHash($pwd) {
        return $this->hash($pwd, $this->salt());
    }

    public function salt() {
        return bin2hex(random_bytes(16));
    }

    public function generateToken($payload) {
        $token = JWT::encode($payload, getenv("JWT_SECRET"));
        return $token;
    }
}