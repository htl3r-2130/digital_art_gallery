<?php
require_once __DIR__ . "/php/classes/Painting.php";
require_once __DIR__ . "/php/classes/Sculpture.php";
$paintings = [
    new Painting(1, "Bild", 1889, "media/art-gallery-pic-1.jpg")
];
$sculptures = [
    new Sculpture(1,"Statue", "1990", "media/art-gallery-sculpture-1.jpg")
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