<?php
require_once 'Artwork.php';

class Painting extends Artwork {

    public function getDisplayHTML(): string {
        return "
        <div class='artwork'>
            <img src='{$this->imagePath}' alt='{$this->title}'>
            <div class='description'>
                <h1>{$this->getTitle()} ({$this->creationYear})</h1>
            </div>
        </div>";
    }
}
