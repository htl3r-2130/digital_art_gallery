<?php
require_once __DIR__ . '/../interfaces/ArtworkInterface.php';

class Painting implements ArtworkInterface {

  public function __construct(private string $title, private string $artist, private string $imagePath) {}

  public function getName(): string {
      return $this->title;
  }

  public function getArtist(): string {
      return $this->artist;
  }

  public function getDisplayHTML(): string {
      return "
        <div class='image'>
          <img src='./{$this->imagePath}' alt=''>
          <div class='description'>
            <h1>{$this->title} - {$this->artist}</h1>
          </div>
        </div>
      ";
  }
}