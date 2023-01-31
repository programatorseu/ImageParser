<?php 
namespace DevPiotr;
class ImageParser 
{
    protected $move = false;
    protected $msg = '';
    public $uploadPath = 'uploads/';
    private $maxSize = 324880;
    private $allowedTypes = ['image/jpeg', 'image/png',];
    protected $file;

    public function __construct($path, $file) {
        $this->uploadPath = $path;
    }
    protected function createFileName() {
        $basename = pathinfo($this->file);
    }
}