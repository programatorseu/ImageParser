<?php
namespace Tests;
use DevPiotr\ImageParser;
use PHPUnit\Framework\TestCase;
class  ImageParserTest extends TestCase {
    protected ImageParser $parser;
    public function setUp(): void
    {
        $this->parser = new ImageParser('/img', 'file.jpg');
    }
    /** @test */
    public function it_gets_correct_folder() 
    {
        $result = $this->parser->uploadPath;
        $expected = '/img';
        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_creates_file_name() 
    {
        $result = $this->parser->createFileName();
        $expected  = 'file.jpg';
        $this->assertSame($expected, $result);
    }
    /** @test */
    public function it_check_file_size() 
    {
        $size = '364880';
        $result = $this->parser->checkFileSize($size);
        $expected = 'File is too big';
        $this->assertSame($expected, $result);
    }


}