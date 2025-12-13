<?php

use PHPUnit\Framework\TestCase;
use Wip\GalleryAmFluss\Model\Sculpture;
use Wip\GalleryAmFluss\Model\Artwork;

class SculptureTest extends TestCase
{
    protected Sculpture $sculpture;

    // fixture
    protected function setUp(): void
    {
        $this->sculpture = new Sculpture(
            2,
            'The Thinker',
            1904,
            '/media/the-thinker.jpg'
        );
    }

    public function testSculptureIsArtwork()
    {
        $this->assertInstanceOf(Sculpture::class, $this->sculpture);
        $this->assertInstanceOf(Artwork::class, $this->sculpture);
    }

    public function testGetDisplayHtmlReturnsHtml()
    {
        $html = $this->sculpture->getDisplayHTML();

        $this->assertIsString($html);
        $this->assertStringContainsString('<img', $html);
        $this->assertStringContainsString('The Thinker', $html);
        $this->assertStringContainsString('1904', $html);
    }

    public function testToArrayReturnsCorrectValues()
    {
        $array = $this->sculpture->toArray();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('id', $array);
        $this->assertArrayHasKey('title', $array);
        $this->assertArrayHasKey('year', $array);
        $this->assertArrayHasKey('image', $array);

        $this->assertSame(2, $array['id']);
        $this->assertSame('The Thinker', $array['title']);
        $this->assertSame(1904, $array['year']);
        $this->assertSame('/media/the-thinker.jpg', $array['image']);
    }
}