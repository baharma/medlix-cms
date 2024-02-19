<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{



    public function UploadImageCkEditor(Request $request){
        if ($request->hasFile('upload')) {
            $filename = saveImageLocal($request->file('upload'),'CkEditor');
            return response()->json(['filename' => $filename, 'uploaded'=> 1, 'url' => $filename]);
        }

    }
}
