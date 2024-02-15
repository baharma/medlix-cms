<?php

use App\Models\CmsApp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

function ActiveApp($get = 'null'){
    $user = Auth::user();
    $app = CmsApp::find($user->default_cms);
    $data['id'] = $app->id;
    $data['name'] = strtoupper($app->app_name);
    $data['url'] = $app->app_url;
    $data['logo'] = $app->logo;

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
