<?php

use PHPUnit\Framework\TestCase;
use Wip\GalleryAmFluss\Model\Painting;
use Wip\GalleryAmFluss\Model\Artwork;

class PaintingTest extends TestCase
{
    protected Painting $painting;

    // fixture
    protected function setUp(): void
    {
        $this->painting = new Painting(
            1,
            'Starry Night',
            1889,
            '/media/starry-night.jpg',
        );
    }

    public function testPaintingIsArtwork()
    {
        $this->assertInstanceOf(Painting::class, $this->painting);
        $this->assertInstanceOf(Artwork::class, $this->painting);
    }

    public function testGetDisplayHtmlReturnsHtml()
    {
        $html = $this->painting->getDisplayHTML();

        $this->assertIsString($html);
        $this->assertStringContainsString('<img', $html);
        $this->assertStringContainsString('Starry Night', $html);
        $this->assertStringContainsString('1889', $html);
    }

    public function testToArrayReturnsCorrectValues()
    {
        $array = $this->painting->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('title', $array);
        $this->assertArrayHasKey('year', $array);
        $this->assertArrayHasKey('image', $array);

        $this->assertSame(1, $array['id']);
        $this->assertSame('Starry Night', $array['title']);
        $this->assertSame(1889, $array['year']);
        $this->assertSame('/media/starry-night.jpg', $array['image']);
    }

    public function testGetInfoText()
    {
        $info = $this->painting->getInfoText();

        $this->assertSame('Starry Night (1889)', $info);
    }
}
