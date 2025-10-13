<?php

//Kein require? NACHFRAGEN
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