<?php 
namespace DevPiotr;
class ImageParser 
{
    protected $move = false;
    protected $msg = '';
    public $uploadPath = 'uploads/';
    protected $maxSize = 324880;
    // private $allowedTypes = ['image/jpeg', 'image/png',];
    protected $file = '';

    public function __construct($path, $file) {
        $this->uploadPath = $path;
        $this->file = $file;
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

}
