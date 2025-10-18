<?php
require_once __DIR__ . '/../interfaces/ArtworkInterface.php';

class Painting implements ArtworkInterface {

    public function __construct(
        private string $title,
        private string $artist,
        private string $imagePath,
        private string $description = ""  // optional
    ) {}

    public function getName(): string {
        return $this->title;
    }

    public function getArtist(): string {
        return $this->artist;
    }

    public function getDisplayHTML(): string {
        $smallImagePath = str_replace("media/", "media/small/", $this->imagePath);

        $html = '<div class="image" style="background-image: url(\'' . $smallImagePath . '\');">';
        $html .= '<div class="backdrop-layer">';
        $html .= '<img src="' . $this->imagePath . '" alt="">';
        $html .= '<div class="description">';
        $html .= '<h1>' . htmlspecialchars($this->title) . ' - ' . htmlspecialchars($this->artist) . '</h1>';
        if (!empty($this->description)) {
            $html .= '<p>' . htmlspecialchars($this->description) . '</p>';
        }
        $html .= '</div></div></div>';

        return $html;
    }
}
