<?php
require_once __DIR__ . "/php/classes/Painting.php";
require_once __DIR__ . "/php/classes/Sculpture.php";
$artist = new Artist(1, "Clara Meier", "Lorem", []);
$paintings = [
    new Painting("Sunset Over the River", $artist, "media/art-gallery-pic-1.jpg"),
    new Painting("Blue Dreams", $artist, "media/art-gallery-pic-2.jpg"),
    new Painting("Silent Horizon", $artist, "media/art-gallery-pic-5.jpg"),
    new Painting("Abstract Fields", $artist, "media/art-gallery-pic-3.jpg"),
    new Painting("Golden Reflections", $artist, "media/art-gallery-pic-4.jpg"),
];
$sculptures = [
    new Sculpture("Stone Embrace", $artist, "media/art-gallery-sculpture-1.jpg"),
    new Sculpture("Rhythm of the Void", $artist, "media/art-gallery-sculpture-5.jpg"),
    new Sculpture("Celestial Spiral", $artist, "media/art-gallery-sculpture-2.jpg"),
    new Sculpture("The Observer", $artist, "media/art-gallery-sculpture-4.jpg"),
    new Sculpture("Iron Blossom", $artist, "media/art-gallery-sculpture-3.jpg"),
];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Gallery Am Fluss</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="header">Paintings</h1>
    <div id="gallery">
        <?php foreach ($paintings as $painting): ?>
            <?= $painting->getDisplayHTML(); ?>
        <?php endforeach; ?>
    </div>

    <h1 id="header">Sculptures</h1>
    <div id="gallery">
        <?php foreach ($sculptures as $sculpture): ?>
            <?= $sculpture->getDisplayHTML(); ?>
        <?php endforeach; ?>
    </div>

</body>
</html>