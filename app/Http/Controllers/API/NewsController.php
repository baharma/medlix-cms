<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
     public function news($slug){

        $article = Article::where('slug',$slug)->first();
        $data = [
            'title' => $article->title,
            'description' => $article->description
        ];
        if (!$data) {
            return response()->json([
                'status' => 404,
                'message'   => 'News Not Found',
            ],404);
        }
        return response()->json([
            'status' => 200,
            'message'   => 'News Details API',
            'data'      => $data
        ]);
    }
}
