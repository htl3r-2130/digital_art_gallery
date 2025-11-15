<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function validateJWT() {
    $headers = getallheaders();

    if (!isset($headers['Authorization'])) {
        http_response_code(401);
        echo json_encode(['error' => 'Missing Authorization header']);
        exit;
    }

    if (!preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid Authorization header format']);
        exit;
    }

    $token = $matches[1];
    $secret = "MY_SUPER_SECRET_KEY";

    try {
        $decoded = JWT::decode($token, new Key($secret, 'HS256'));
        return $decoded;
    } catch (\Firebase\JWT\ExpiredException $e) {
        http_response_code(401);
        echo json_encode(['error' => 'Token expired']);
        exit;
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(['error' => 'Invalid token']);
        exit;
    }
}
