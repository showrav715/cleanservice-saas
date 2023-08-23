<?php

namespace App\Http\Helpers;
use Intervention\Image\ImageManagerStatic as Image;

class MediaHelper {

    // image is file
    // field is database field photo name
    // array is image resize width and height
    public static function handleMakeImage($file,$resize_array=null,$ticket = false)
    {
        $image_name = MediaHelper::imageNameValidation($file);
        $locaion = base_path('../assets/images/');
       
        $fileExts = ['pdf','doc','docx','csv'];
        if($ticket || in_array($file->getClientOriginalExtension(),$fileExts)){
            $locaion = base_path('../assets/ticket/');
            $file->move($locaion, $image_name);
        }else{
            if($resize_array){
                $image = Image::make($file)->resize($resize_array[0], $resize_array[1]);
               if ($file->getClientOriginalExtension() == 'gif') {
                    copy($file->getRealPath(), $locaion.'/'.$image_name);
                }
                else {
                   $image->save($locaion.'/'.$image_name);
                }
            }else{
                $image = Image::make($file);
                 if ($file->getClientOriginalExtension() == 'gif') {
                    copy($file->getRealPath(), $locaion.'/'.$image_name);
                }
                else {
                   $image->save($locaion.'/'.$image_name);
                }
                
            } 
        }

        return $image_name;
    }

    // image is file
    // field is database field photo name
    // array is image resize width and height
    public static function sellerHandleMakeImage($file,$resize_array=null)
    {
        $image_name = MediaHelper::imageNameValidation($file);
        $locaion = base_path('../assets/images/'.sellerId().'/');
        
            if(!is_dir($locaion)){
                @mkdir($locaion, 0777, true);
            }

            if($resize_array){
                $image = Image::make($file)->resize($resize_array[0], $resize_array[1]);
               if ($file->getClientOriginalExtension() == 'gif') {
                    copy($file->getRealPath(), $locaion.'/'.$image_name);
                }
                else {
                   $image->save($locaion.'/'.$image_name);
                }
            }else{
                $image = Image::make($file);
                 if ($file->getClientOriginalExtension() == 'gif') {
                    copy($file->getRealPath(), $locaion.'/'.$image_name);
                }
                else {
                   $image->save($locaion.'/'.$image_name);
                }
                
            } 
        return $image_name;
    }

    // image is file
    // field is database field photo name
    // array is image resize width and height
    public static function handleUpdateImage($file,$field,$resize_array=null)
    {
        $image_name = MediaHelper::imageNameValidation($file);
        $locaion = base_path('../assets/images/');
       
        if($field && file_exists($locaion.$field)){
            @unlink($locaion.$field);
        }
        if($resize_array){
            $image = Image::make($file)->resize($resize_array[0], $resize_array[1]);
            if ($file->getClientOriginalExtension() == 'gif') {
                copy($file->getRealPath(), $locaion.'/'.$image_name);
            }
            else {
               $image->save($locaion.'/'.$image_name);
            }
        }else{
            $image = Image::make($file);
            if ($file->getClientOriginalExtension() == 'gif') {
                copy($file->getRealPath(), $locaion.'/'.$image_name);
            }
            else {
               $image->save($locaion.'/'.$image_name);
            }
        } 
        return $image_name;
    }

    // image is file
    // field is database field photo name
    // array is image resize width and height
    public static function sellerHandleUpdateImage($file,$field,$resize_array=null)
    {
        $image_name = MediaHelper::imageNameValidation($file);
        $locaion = base_path('../assets/images/'.sellerId().'/');
        
        if(!is_dir($locaion)){
            mkdir($locaion, 0777, true);
        }
        if($field && file_exists($locaion.$field)){
            @unlink($locaion.$field);
        }
        if($resize_array){
            $image = Image::make($file)->resize($resize_array[0], $resize_array[1]);
            if ($file->getClientOriginalExtension() == 'gif') {
                copy($file->getRealPath(), $locaion.'/'.$image_name);
            }
            else {
               $image->save($locaion.'/'.$image_name);
            }
        }else{
            $image = Image::make($file);
            if ($file->getClientOriginalExtension() == 'gif') {
                copy($file->getRealPath(), $locaion.'/'.$image_name);
            }
            else {
               $image->save($locaion.'/'.$image_name);
            }
        } 
        return $image_name;
    }

    public static function handleDeleteImage($field)
    {
        $locaion = base_path('../assets/images/');
        if($field && file_exists($locaion.$field)){
            unlink($locaion.$field);
        }
    }
    public static function sellerhandleDeleteImage($field)
    {
        $locaion = base_path('../assets/images/'.sellerId().'/');
        if($field && file_exists($locaion.$field)){
            unlink($locaion.$field);
        }
    }



    public static function imageNameValidation($image)
    {
       $extension = $image->getClientOriginalExtension();
       $new_name = rand().time() . '.'. $extension;
       return $new_name;
    }

    public static function ExtensionValidation($image)
    {
       $extension = ['jpg','JPG','jpeg','JPEG','zip','pdg','csv','png','PNG','pdf','doc','docx'];
       $image_extension = $image->getClientOriginalExtension();
       if(in_array($image_extension,$extension)){
           return true;
       }else{
           return false;
       }
    }

    public static function ExtensionFileValidation($file)
    {
       $extension = ['zip','rar'];
       $image_extension = $file->getClientOriginalExtension();
       if(in_array($image_extension,$extension)){
           return true;
       }else{
           return false;
       }
    }



    public static function sellerHandleMakeFile($file)
    {
        $file_name = MediaHelper::imageNameValidation($file);
        $locaion = base_path('../assets/images/'.sellerId().'/files/');
        if(!is_dir($locaion)){
            mkdir($locaion, 0777, true);
        }
        $file->move($locaion,$file_name);
        return $file_name;
    }

    public static function sellerHandleUpdateFile($file,$file_name)
    {
        $file_name = MediaHelper::imageNameValidation($file);
        $locaion = base_path('../assets/images/'.sellerId().'/files/');
        if($file_name && file_exists($locaion.$file_name)){
            @unlink($locaion.$file_name);
        }
        if(!is_dir($locaion)){
            mkdir($locaion, 0777, true);
        }
        $file->move($locaion,$file_name);
        return $file_name;
    }
}