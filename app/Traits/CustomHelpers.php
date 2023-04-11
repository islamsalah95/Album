<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait CustomHelpers{

      public static function uploadImgNull(Request $request,$img){
         if($request->file($img)){
            $fileName=$request->file($img)->getClientOriginalName();
            if ($request->hasFile($img)) {
             $request->file($img)->move(public_path('assets\images'),$fileName);
            //  $pathImg = asset('assets/images/'.$fileName) ;//http://127.0.0.1:8000/assets/images/test.jpg
                  
             return $fileName;
            }
         }else{
            return "";
         }
            }
            

            public static function deletePicture($name){
               if(File::exists(public_path('assets/images/' . $name))){
                  File::delete(public_path('assets/images/' . $name));
                  }  
                  }


  


}