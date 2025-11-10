<?php
require_once 'Artwork.php';

class Painting extends Artwork {
    
    public function __construct(protected string $title, protected Artist $artist, protected string $imagePath,) {}

    public function getDisplayHTML(): string {
        return "
        <div class='image'>
            <img src='{$this->imagePath}' alt='{$this->title}'>
            <div class='description'>
                <h1>{$this->title} - {$this->artist->name}</h1>
            </div>
        </div>";
    }
}
