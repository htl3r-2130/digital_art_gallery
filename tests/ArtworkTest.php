<?php

use PHPUnit\Framework\TestCase;
use Wip\GalleryAmFluss\Model\Artwork;

class TestArtwork extends Artwork
{
    public function getDisplayHtml(): string
    {
        return '<div>Test Artwork</div>';
    }

    public function toArray(): array
    {
        return [
            'id' => 1,
            'title' => $this->title,
            'year' => $this->creationYear,
            'imagePath' => $this->imagePath,
        ];
    }
}

class ArtworkTest extends TestCase
{
    protected Artwork $artwork;

    // fixture
    protected function setUp(): void
    {
        $this->artwork = new TestArtwork(
            1,
            'Starry Night',
            1889,
            '/media/starry-night.jpg',
        );
    }

    public function testArtworkCanBeCreated()
    {
        $this->assertInstanceOf(Artwork::class, $this->artwork);
    }

    public function testGetTitleReturnsCorrectValue()
    {
        $this->assertSame('Starry Night', $this->artwork->getTitle());
        $this->assertIsString($this->artwork->getTitle());
    }

    public function testGetDisplayHtmlReturnsString()
    {
        $html = $this->artwork->getDisplayHtml();

        $this->assertIsString($html);
        $this->assertStringContainsString('Test Artwork', $html);
    }

    public function testToArrayReturnsCorrectStructure()
    {
        $array = $this->artwork->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('title', $array);
        $this->assertArrayHasKey('year', $array);
        $this->assertArrayHasKey('imagePath', $array);
    }
}
