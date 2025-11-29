<?php
require __DIR__ . "/../vendor/autoload.php";

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Wip\GalleryAmFluss\Model\Seeder;

$template = fread(fopen("qrtemplate.html", "r"), filesize("qrtemplate.html"));

$artists = Seeder::seed();
$paintings = [];
foreach ($artists as $artist) {
  foreach ($artist->artworks as $artwork) {
    $paintings[] = $artwork;
  }
}

$qrOutput = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $id = $_POST["id"] ?? "";

  if (!ctype_digit($id) || !isset($paintings[$id])) {
    $qrOutput = "<p class='error'>❌ Ungültige Artwork ID!</p>";
  } else {

    $data = $paintings[$id]->getInfoText();

    $builder = new Builder(
      writer: new PngWriter(),
      data: $data,
      encoding: new Encoding('UTF-8'),
      errorCorrectionLevel: ErrorCorrectionLevel::High,
      size: 250,
      margin: 10,
      roundBlockSizeMode: RoundBlockSizeMode::Margin
    );

    $result = $builder->build();

    $qrFile = "media/qr/custom-" . $id . ".png";
    $result->saveToFile($qrFile);

    $qrOutput = "<img src='$qrFile' alt='QR Code'>";
  }
}

$render = str_replace("{{qrResult}}", $qrOutput, $template);
echo $render;
