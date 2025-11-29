<?php
$template = fread(fopen("template.html", "r"), filesize("index.html"));

$artworks = [
    ["media/art-gallery-pic-1.jpg", "Sunset River (2001)"],
    ["media/art-gallery-pic-2.jpg", "Mountain Dreams (1998)"],
    ["media/art-gallery-pic-3.jpg", "Ocean Reflections (2015)"]
];

$artworkText = "";
foreach ($artworks as $artwork) {
  $artworkText .= <<<HTML
        <div class='artwork'>
            <img src="{$artwork[0]}" alt="painting">
            <div class='description'>
                <h1>{$artwork[1]}</h1>
            </div>
        </div>
    HTML;
} 
$render = str_replace("{{Artworks}}", $artworkText, $template);
echo $render;