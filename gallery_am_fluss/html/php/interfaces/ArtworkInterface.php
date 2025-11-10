<?php

interface ArtworkInterface{
    public function getTitle(): string;
    public function getArtist(): Artist;
    public function getDisplayHtml(): string;
}