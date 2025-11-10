<?php

require_once __DIR__ . "/../interfaces/ArtworkInterface.php";

abstract class Artwork implements ArtworkInterface {
    protected int $id;
    protected string $title;
    protected int $creationYear;
    protected string $imagePath;

    public function __construct($id, $title, $creationYear, $imagePath) {
        $this->id = $id;
        $this->title = $title;
        $this->creationYear = $creationYear;
        $this->imagePath = $imagePath;
    }

    public function getTitle(): string {
        return $this->title;
    }
    
    abstract public function getDisplayHtml(): string;
}
