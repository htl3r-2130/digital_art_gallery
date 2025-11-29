<?php
require __DIR__ . '/../vendor/autoload.php';

use Wip\GalleryAmFluss\Model\Seeder;
use Wip\GalleryAmFluss\Model\Artist;

$artists = Seeder::seed();

$language = $_COOKIE["language"] ?? null;
switch ($language) {
    case "de":
        $headerText = "Willkommen in der digitalen Galerie!";
        break;
    case "en":
        $headerText = "Welcome to the digital gallery!";
        break;
    default:
        $headerText = "Willkommen in der digitalen Galerie!";
        break;
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Gallery Am Fluss</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1 id=header><?= $headerText ?><a href="preferences.php">DE/EN</a></h1>


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