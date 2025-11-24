<?php
require __DIR__ . '/../vendor/autoload.php';

use Wip\GalleryAmFluss\Model\Seeder;
use Wip\GalleryAmFluss\Model\Artist;

$artists = Seeder::seed();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Gallery Am Fluss</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h1 id=header>Seeder example</h1>
        <?php foreach ($artists as $artist): ?>
        <h1><?= htmlspecialchars($artist->name) ?></h1>
        <div id="gallery">
            <?php foreach ($artist->artworks as $painting): ?>
                <?= $painting->getDisplayHtml(); ?>
            <?php endforeach; ?>
        </div>
        <br>
    <?php endforeach; ?>
</body>
</html>