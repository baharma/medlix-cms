<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\CmsApp;
use Illuminate\Http\Request;

class NewsController extends Controller
{
     public function news($slug){

        $article = Article::where('slug',$slug)->first();
        $contact =  CmsApp::find(2);
        $data['app'] = [
            'name'  => $contact->app_name,
            'url'   => $contact->app_url,
            'logo'  => $contact->logo,
            'address'   => $contact->app_address,
            'mail'  => $contact->app_mail,
            'phone' => $contact->app_phone,
            'wa'    => $contact->app_wa,
            'gmaps' => $contact->app_gmaps,
            'social'=> json_decode($contact->extend),
            'fav'   => asset($contact->favicon)
        ];

        $data += [
            'news_title' => $article->title,
            'news_details' => $article->description
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
