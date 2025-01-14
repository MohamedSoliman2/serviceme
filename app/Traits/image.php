<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait image{
    public function saveimage($request,$name){
    
        if($request->hasFile($name)){
           
            $file=$request->file($name);
            $nameimg=$file->getClientOriginalName().date('y-m-d-h-i-s').'.'.$request->$name->extension();
            $path1=$file->storeAs('store',$nameimg,'public');
           return $path1;
        }
    }

    public function updateimage($request,$name,$path){
        if($path != null){
        Storage::disk('public')->delete($path);
    }
        if($request->hasFile($name)){
            $file=$request->file($name);
            $nameimg=$file->getClientOriginalName().date('y-m-d-h-i-s').'.'.$request->$name->extension();;
            $path1=$file->storeAs('store',$nameimg,'public');
           return $path1;
        }
    }
    public function deleteimage($path){
        Storage::disk('public')->delete($path);
        return true;
    }
}
?>