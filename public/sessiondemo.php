<?php
session_save_path("/tmp");
session_start();

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits']++;
}

$sessionId = session_id();
$sessionPath = ini_get("session.save_path");
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Session Demo</title>
</head>
<body>
    <h1>Session Example</h1>

    <p>Session ID: <strong><?= $sessionId ?></strong></p>
    <p>Session Save Path (Server): <strong><?= $sessionPath ?></strong></p>
    <p>Number of visits in this session: <strong><?= $_SESSION['visits'] ?></strong></p>

    <a href="sessionreset.php">Reset Session</a>
</body>
</html>
