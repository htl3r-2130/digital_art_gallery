<?php

interface ArtworkInterface{
    public function getName(): string;
    public function getArtist(): string;
    public function getDisplayHtml(): string;
}