<?php

   function UploadImage($image , $path){
        $imageName = sha1($image->getClientOriginalName());
        $imageExt = $image->getClientOriginalExtension(); // return image extension
        $imageNewName = date('y-m-d') . '_' . $imageName . '.' . $imageExt;
        $image->move($path , $imageNewName);
        $imagePath = $path . '/' . $imageNewName;
        return $imagePath;
   }


   function role(){
       return [
            '0' => 'admin' ,
            '1' => 'user' ,
       ];
   }

