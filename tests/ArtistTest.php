<?php

use PHPUnit\Framework\TestCase;
use Wip\GalleryAmFluss\Model\Artist;

class ArtistTest extends TestCase
{
    public function testArtistCanBeCreated()
    {
        $artist = new Artist(
            1,
            'Claude Monet',
            'Founder of French Impressionist painting',
            [],
        );

        $this->assertInstanceOf(Artist::class, $artist);
        $this->assertSame(1, $artist->id);
        $this->assertSame('Claude Monet', $artist->name);
        $this->assertSame('Founder of French Impressionist painting', $artist->biography);
        $this->assertIsArray($artist->artworks);
    }

    public function testToArrayReturnsCorrectStructure()
    {
        $artist = new Artist(
            2,
            'Vincent van Gogh',
            'Dutch post-impressionist painter',
            [],
        );

        $array = $artist->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('name', $array);
        $this->assertArrayHasKey('biography', $array);
        $this->assertArrayHasKey('artworks', $array);
        $this->assertSame([], $array['artworks']);
    }

    public function testToArrayWithArtworks()
    {
        // Einfaches Mock-Objekt mit toArray()
        $artwork = new class {
            public function toArray(): array
            {
                return [
                    'title' => 'Water Lilies',
                    'year' => 1899,
                ];
            }
        };

        $artist = new Artist(
            3,
            'Claude Monet',
            'Impressionist painter',
            [$artwork],
        );

        $array = $artist->toArray();

        $this->assertCount(1, $array['artworks']);
        $this->assertSame('Water Lilies', $array['artworks'][0]['title']);
        $this->assertSame(1899, $array['artworks'][0]['year']);
    }

    public function testEmptyBiographyEdgeCase()
    {
        $artist = new Artist(
            4,
            'Unknown Artist',
            '',
            [],
        );

        $array = $artist->toArray();

        $this->assertSame('', $array['biography']);
    }
}

//Dokumentation

//docker exec -it php-fpm vendor/bin/phpunit tests

// PHPUnit 11.5.46 by Sebastian Bergmann and contributors.

// Runtime:       PHP 8.2.29

// ....                                                                4 / 4 (100%)

// Time: 00:00.003, Memory: 8.00 MB

// OK (4 tests, 15 assertions)
