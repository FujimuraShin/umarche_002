<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ImageService{

    public static function upload($imageFile,$folderName){
        
        //dd($imageFile['image']);
       // Storage::putFile('public/'.$folderName.'/',$imageFile);

       if(is_array($imageFile)){
            $file=$imageFile['image'];
       }else{
            $file=$imageFile;
       }

        $filename=uniqid(rand().'_');
        $extension=$file->extension();
        $fileNameToStore=$filename.'.'.$extension;

        $resizedImage=InterventionImage::make($file)->resize(1920,1080)->encode();


        Storage::put('public/'.$folderName.'/'.$fileNameToStore,$resizedImage);
        
        return $fileNameToStore;
    }
}