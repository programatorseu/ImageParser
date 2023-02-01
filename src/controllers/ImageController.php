<?php 
namespace DevPiotr\Controllers;
class ImageController {
    public function upload() 
    {
        var_dump($_FILES['image']);
    }
}