<?php

require_once __DIR__ . "/../interfaces/ArtworkInterface.php";
require_once __DIR__ . "/Artist.php";

abstract class Artwork implements ArtworkInterface {
    protected int $id;
    protected string $title;
    protected Artist $artist;
    protected int $creationYear;
    protected string $imagePath;

    public function __construct($id, $title, $artist, $creationYear, $imagePath) {
        $this->id = $id;
        $this->title = $title;
        $this->artist = $artist;
        $this->creationYear = $creationYear;
        $this->imagePath = $imagePath;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getArtist(): Artist {
        return $this->artist;
    }
    
    abstract public function getDisplayHtml(): string;
}
