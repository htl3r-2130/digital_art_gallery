<?php
require_once __DIR__ . "/php/classes/Painting.php";

$paintings = [
    new Painting("Sunset Over the River", "Clara Meier", "media/art-gallery-pic-1.jpg"),
    new Painting("Blue Dreams", "Luca Weiss", "media/art-gallery-pic-2.jpg"),
    new Painting("Abstract Fields", "Sofia Müller", "media/art-gallery-pic-3.jpg"),
    new Painting("Golden Reflections", "Jonas Becker", "media/art-gallery-pic-4.jpg"),
    new Painting("Silent Horizon", "Emma Scholz", "media/art-gallery-pic-5.jpg"),
];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Gallery Am Fluss – Paintings</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gallery Am Fluss userStory 6 Paintings</h1>
    <div id="gallery">
        <?php foreach ($paintings as $painting): ?>
            <?= $painting->getDisplayHTML() ?>
        <?php endforeach; ?>
    </div>
</body>
</html>