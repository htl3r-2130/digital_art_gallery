<?php
class Artist {
    public int $id;
    public string $name;
    public string $biography;
    public array $artworks = [];

    public function __construct($id, $name, $biography, $artworks) {
        $this->id = $id;
        $this->name = $name;
        $this->biography = $biography;
        $this->artworks = $artworks;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'biography' => $this->biography,
            'artworks' => array_map(fn($art) => $art->toArray(), $this->artworks)
        ];
    }
}