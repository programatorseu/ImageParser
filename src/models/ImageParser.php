<?php 
namespace DevPiotr\models;

class ImageParser 
{
    protected $move = false;
    protected $msg = '';
    public $uploadPath = '';
    protected $maxSize = 324880;
    // private $allowedTypes = ['image/jpeg', 'image/png',];
    public $file = '';

    public function __construct($file, $path = null) {
        $this->file = $file;
        $this->uploadPath = $path ?? dirname(dirname(__DIR__)) . '/uploads/';
    }

    public function createFileName() {
        $basename = pathinfo($this->file, PATHINFO_FILENAME);
        $ext = pathinfo($this->file, PATHINFO_EXTENSION);
        $basename = preg_replace('/[^A-z0-9]/', '-', $basename); 
        $i = 0;
        // check if file exists
        while(file_exists($this->uploadPath . $this->file)) {
            $i =  $i+1;
            $this->file = $basename . $i . '.' . $ext;
        }
        return $this->file;
    }
    public function checkFileSize($file) 
    {
        return ($file > $this->maxSize) ? 'File is too big' : '';
    }
    public function moveImage() 
    {
        $image = imagecreatefromjpeg($this->file);
        return copy($image, $this->uploadPath . $image);
    }

}
