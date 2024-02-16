<?php

use App\Models\CmsApp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

function ActiveApp($get = 'null'){
    $user = Auth::user();
    $app = CmsApp::find($user->default_cms);
    $data['id'] = $app?->id??0;
    $data['name'] = strtoupper($app?->app_name)??'';
    $data['url'] = $app?->app_url??null;
    $data['logo'] = $app?->logo??null;

    return $data[$get];
}
function appLogo(){
    return "<img src=".asset(ActiveApp('logo'))." style='width: 110px' alt='logo icon'>";
}

function mataUang($num){
    return 'Rp'. number_format($num,0,',' ,'.');
}

function saveImageLocal(UploadedFile $file,$path){
    $filename = uniqid() . '_' . $file->getClientOriginalName();
    $file->storeAs($path, $filename, 'images_local');
    $FilePath = 'Image/'.$path.'/'.$filename;
    return $FilePath;
}
function saveImageLocalNew(UploadedFile $file, $path, $name = 'default') {
    $extension = $file->getClientOriginalExtension(); // Get the original extension
    $filename = $name . '.' . $extension; // Combine name and extension

    // Check if the file with the same name exists
    $existingFilePath = public_path('Image/' . $path . '/' . $filename);
    if (file_exists($existingFilePath)) {
        // Remove the existing file
        unlink($existingFilePath);
    }

    // Store the file with the generated filename
    $file->storeAs($path, $filename, 'images_local');

    // Construct the file path
    $FilePath = 'Image/' . $path . '/' . $filename;

    return $FilePath;
}
function isNull($data){
    return is_null($data)? true: false; 
}
function decode($data){
    return json_decode($data,true);
}
