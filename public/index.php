<?php
require __DIR__ . "/../vendor/autoload.php";

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;

$writer = new PngWriter();
$template = fread(fopen("template.html", "r"), filesize("index.html"));

$artworks = [
    ["media/art-gallery-pic-1.jpg", "Sunset River (2001)", "Sunset River (2001) – Famous river landscape painting"],
    ["media/art-gallery-pic-2.jpg", "Mountain Dreams (1998)", "Mountain Dreams (1998) – Abstract mountain scenery"],
    ["media/art-gallery-pic-3.jpg", "Ocean Reflections (2015)", "Ocean Reflections (2015) – Modern ocean reflections"]
];

$artworkText = "";
foreach ($artworks as $artwork) {

    $builder = new Builder(
        writer: new PngWriter(),
        data: $artwork[2],
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::High,
        size: 150,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin
    );;
    $result = $builder->build();
    $slug = slugify($artwork[1]);
    $qrFile = "media/qr/qr-$slug.png";
    $result->saveToFile($qrFile);

    $artworkText .= <<<HTML
        <div class='artwork'>
            <img src="{$artwork[0]}" alt="painting">
            <div class='description'>
                <h1>{$artwork[1]}</h1>
                <img class="qr" src="$qrFile" alt="QR Code">
            </div>
        </div>
    HTML;
}
$render = str_replace("{{Artworks}}", $artworkText, $template);
echo $render;

function slugify($text)
{
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
    return trim($text, '-');
}
