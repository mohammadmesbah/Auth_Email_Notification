<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait{
    public function uploadImage(Request $request, $folderName){
        $image= $request->file('photo')->getClientOriginalName();
        $path= $request->file('photo')->storeAs($folderName,$image,'mohammad');
        return $path;
    }
}