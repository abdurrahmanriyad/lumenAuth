<?php

namespace Abdurrahmanriyad\LumenAuth;

use Firebase\JWT\JWT;

class LumenAuth
{
    /**
     * Pass instance of user
     * @param $user
     * @return mixed
     */
    public function getToken($user) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];

        return JWT::encode($payload, env('LUMEN_AUTH_SECRET'));
    }
}