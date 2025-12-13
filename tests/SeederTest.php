<?php

use PHPUnit\Framework\TestCase;
use Wip\GalleryAmFluss\Model\Seeder;
use Wip\GalleryAmFluss\Model\Artist;
use Wip\GalleryAmFluss\Model\Painting;

class SeederTest extends TestCase
{
    protected array $artists;

    /**
     * Fixture
     */
    protected function setUp(): void
    {
        $this->artists = Seeder::seed();
    }

    public function testSeedReturnsArrayOfArtists()
    {
        $this->assertIsArray($this->artists);
        $this->assertNotEmpty($this->artists);

        foreach ($this->artists as $artist) {
            $this->assertInstanceOf(Artist::class, $artist);
        }
    }

    public function testArtistsContainPaintings()
    {
        foreach ($this->artists as $artist) {
            $this->assertIsArray($artist->artworks);
            $this->assertNotEmpty($artist->artworks);

            foreach ($artist->artworks as $artwork) {
                $this->assertInstanceOf(Painting::class, $artwork);
            }
        }
    }

    public function testFirstArtistHasExpectedData()
    {
        $firstArtist = $this->artists[0];

        $this->assertSame(1, $firstArtist->id);
        $this->assertIsString($firstArtist->name);
        $this->assertIsString($firstArtist->biography);
        $this->assertCount(4, $firstArtist->artworks);
    }
}