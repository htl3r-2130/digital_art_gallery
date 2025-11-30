<?php
session_save_path("/tmp");

ini_set("session.gc_maxlifetime", 300); // 300 Sekunden = 5 Minuten
ini_set("session.gc_probability", 1);
ini_set("session.gc_divisor", 1); // GC läuft bei JEDEM Request

session_set_cookie_params([
    'lifetime' => 300,              // Session Cookie 5min
    'path' => '/',                  // gültig für gesamte Domain
    'domain' => "",                 // leer = aktuelle Domain
    'secure' => false,              // true falls HTTPS aktiv! (entwicklungsumgebung = false)
    'httponly' => true,             // JS Zugriff verhindern
    'samesite' => 'Strict'          // CSRF Schutz
]);

session_start();
// Session Fixation verhindern
session_regenerate_id(true);

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
    <p>Session Cookie Lifetime: <?= ini_get("session.cookie_lifetime") ?> seconds</p>
    <p>Session GC Lifetime: <?= ini_get("session.gc_maxlifetime") ?> seconds</p>
    <p>GC probability: <?= ini_get("session.gc_probability") ?>/<?= ini_get("session.gc_divisor") ?></p>

    <a href="sessionreset.php">Reset Session</a>
</body>

</html>