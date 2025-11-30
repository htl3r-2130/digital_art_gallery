<?php
session_save_path("/tmp");

session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'secure' => false,
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

$_SESSION = [];
session_destroy();

setcookie(session_name(), '', time() - 3600, '/');

header("Location: sessiondemo.php");
exit;