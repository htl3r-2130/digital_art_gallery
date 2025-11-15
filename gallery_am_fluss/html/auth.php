<?php
require_once __DIR__ . "/vendor/autoload.php";

use Firebase\JWT\JWT;

$secret = "MY_SUPER_SECRET_KEY";

$payload = [
    "user" => "demo",
    "iat" => time(),
    "exp" => time() + 20 
];

$jwt = JWT::encode($payload, $secret, 'HS256');

echo json_encode(["token" => $jwt]);
