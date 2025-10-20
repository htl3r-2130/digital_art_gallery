<?php

require_once __DIR__ . "/../interfaces/ArtworkInterface.php";
abstract class AbstractArtwork implements ArtworkInterface
{
    public function __construct(protected string $name, protected string $artist){}

    public function getName(): string
    {
        return $this->name;
    }

    public function getArtist(): string
    {
        return $this->artist;
    }
    abstract public function getDisplayHtml(): string;
}