<?php
namespace Tests;
use DevPiotr\ImageParser;
use PHPUnit\Framework\TestCase;
class  ImageParserTest extends TestCase {
    protected ImageParser $parser;
    public function setUp(): void
    {
        $this->parser = new ImageParser('/img', 'file');
    }

    /** @test */
    public function it_gets_correct_folder() 
    {
        $result = $this->parser->uploadPath;
        $expected = '/img';
        $this->assertSame($expected, $result);
    }
}