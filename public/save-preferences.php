<?php

// Delete request
if (isset($_POST['delete'])) {
    setcookie(
        name: 'language',
        value: '',
        expires_or_options: time() - 3600,
        path: '/',
        secure: false,
        httponly: true,
    );

    header("Location: preferences.php");
    exit;
}

// Save new language preference
$language = $_POST['language'] ?? null;

if ($language !== null) {
    setcookie(
        name: 'language',
        value: $language,
        expires_or_options: time() + (86400 * 30),
        path: '/',
        secure: false,
        httponly: true,
    );
}

header("Location: preferences.php");
exit;
