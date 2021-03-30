<?php

namespace App\Http\Controllers;

use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    const TYPE__FIT  = "fit";
    const TYPE__FILL = "fill";
    const FORMAT     = 'jpg';
    const QUALITY    = 75;
    const ALLOWED    = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif'];
 
    public function resize($size, $type = self::TYPE__FIT, $imagePath)
    {
        /// http://land.vn/resizes/icon/fit/images/commun.jpg?v=12345678

        $imageFullPath = public_path($imagePath);
        $sizes = Config::get('image.SIZES');

        if(!File::isFile($imageFullPath) || !isset($sizes[$size])){

            abort(404);
        }
    
        $savedPath = public_path('resizes/' . $size . '/' . $type . '/' . $imagePath);
        $savedDir  = dirname($savedPath);

        if(!File::isDirectory($savedDir)){

            File::makeDirectory($savedDir, 0777, true, true);
        }
    
        list($width, $height) = $sizes[$size];
    
        if($type == self::TYPE__FILL){

            // create empty canvas
            $background = Image::canvas($width, $height);
            // fill image with color
            $background->fill('#cccccc');

            $image = Image::make($imageFullPath)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert resized image centered into background
            $background->insert($image, 'center');

            // save or do whatever you like
            $background->save($savedPath);

            return $background->response();
        }
        
        $image = Image::make($imageFullPath)->$type($width, $height)->save($savedPath);

        return $image->response();
    }


    public function encode($quality = self::QUALITY, $imagePath)
    {
        $imageFullPath = public_path($imagePath);
        
        /// check file exist
        if(!File::isFile($imageFullPath) || !is_numeric($quality)){

            abort(404);
        }
    
        
        $image = Image::make($imageFullPath);
        $mime = $image->mime();
        
        if (isset(self::ALLOWED[$mime])) {

            $format = self::ALLOWED[$mime];
        }else{
            
            $format = pathinfo(
                parse_url($imagePath, PHP_URL_PATH), 
                PATHINFO_EXTENSION
            );
        }
        

        $savedPath = public_path('compress/' . $quality . '/' . $imagePath);
        $savedDir  = dirname($savedPath);

        if(!File::isDirectory($savedDir)){

            File::makeDirectory($savedDir, 0777, true, true);
        }
        try {
            // encode png image as jpg
            $image = $image->encode($format, $quality)->save($savedPath);

            return $image->response();
        } catch (\Throwable $th) {

            return abort(404);
        }
    }
    

    public function resize_compress($size, $type = self::TYPE__FIT, $quality = 70, $ext = 'jpg',$imagePath)
    {
        /// http://thietkewebsite.com.vn/resize-compress/icon/fit/70/jpg/images/gift.png

        $imageFullPath = public_path($imagePath);
        $sizes = Config::get('image.SIZES');

        if(!File::isFile($imageFullPath) || !isset($sizes[$size])){

            return abort(404);
        }
        $savedPath = public_path( $size . '/' . $type . '/' . $quality . '/' . $ext . '/' . $imagePath);
        $savedDir  = dirname($savedPath);

        if(!File::isDirectory($savedDir)){

            File::makeDirectory($savedDir, 0777, true, true);
        }
    
        list($width, $height) = $sizes[$size];
    
        if($type == self::TYPE__FILL){

            // create empty canvas
            $background = Image::canvas($width, $height);
            // fill image with color
            $background->fill('#cccccc');

            $image = Image::make($imageFullPath)->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            // insert resized image centered into background
            $background->insert($image, 'center');

            $imageResize = $background;
        }
        
        $imageResize = Image::make($imageFullPath)->$type($width, $height);

        /// compress
        $mime = $imageResize->mime();
        
        if (isset(self::ALLOWED[$mime])) {

            $format = self::ALLOWED[$mime];
        }else{
            
            $format = pathinfo(
                parse_url($imagePath, PHP_URL_PATH), 
                PATHINFO_EXTENSION
            );
        }
        $savedPath = 'resize-compress/' . $size . '/' . $type . '/' . $quality . '/' . $ext . '/' . trim($imagePath, $format) . $ext;

        $savedPath = public_path($savedPath);
        $savedDir  = dirname($savedPath);

        if(!File::isDirectory($savedDir)){

            File::makeDirectory($savedDir, 0777, true, true);
        }
        try {
            
            // encode png image as jpg
            $image = $imageResize->encode($ext, $quality);

            /// create watermark 
            $watermark = Image::make(public_path('/watermark.png'))->opacity(50);
            
            /* insert watermark at bottom-right corner with 10px offset */
            $image->insert($watermark, 'bottom-right', 10, 10);
            /// lưu lại
            $image->save($savedPath);

            return $image->response();
        } catch (\Throwable $th) {

            return abort(404);
        }
    }
}
