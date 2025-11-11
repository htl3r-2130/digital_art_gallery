<?php
require_once __DIR__ . "/php/classes/Seeder.php";

if (!isset($_SERVER['HTTP_ACCEPT']) || $_SERVER['HTTP_ACCEPT'] !== 'application/json') {
    http_response_code(406);
    echo json_encode(['error' => 'Only application/json supported']);
    exit;
}
header('Content-Type: application/json; charset=utf-8');

$artists = Seeder::seed();
if (!isset($_GET['id'])) { http_response_code(400); echo json_encode(['error'=>'Missing parameter: id']); exit; }
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
    echo json_encode(['error'=>'Painting not found']);
}
//curl -H "Accept: application/json" "http://localhost/api.php?id=7"