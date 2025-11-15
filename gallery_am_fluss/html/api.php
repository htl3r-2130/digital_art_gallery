<?php
require_once __DIR__ . "/vendoor/autoload.php";
require_once __DIR__ . "/php/jwtMiddleware.php";
require_once __DIR__ . "/php/classes/Seeder.php";

header('Content-Type: application/json; charset=utf-8');

// Wenn ein einzelnes Artwork angefragt wird -> Token Pflicht
if (isset($_GET['id'])) {
    validateJWT();
}

$artists = Seeder::seed();

// Alle Artworks (für list.html) – öffentlich
if (!isset($_GET['id'])) {
    $allArtworks = [];
    foreach ($artists as $artist) {
        if (!property_exists($artist, 'artworks')) continue;
        foreach ($artist->artworks as $art) {
            if (method_exists($art, 'toArray')) {
                $allArtworks[] = $art->toArray();
            }
        }
    }
    echo json_encode($allArtworks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

// Einzelnes Artwork anhand der id (geschützt)
$id = intval($_GET['id']);
$found = null;

foreach ($artists as $artist) {
    if (!property_exists($artist, 'artworks')) continue;
    foreach ($artist->artworks as $art) {
        if (method_exists($art, 'toArray')) {
            $arr = $art->toArray();
            if (isset($arr['id']) && intval($arr['id']) === $id) {
                $found = $arr;
                break 2;
            }
        }
    }
}

if ($found) {
    echo json_encode($found, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Painting not found']);
}
//curl http://localhost/api.php
//curl http://localhost/api.php?id=7
//curl http://localhost/auth.php
//curl -H "Authorization: Bearer <token>" "http://localhost/api.php?id=7"
