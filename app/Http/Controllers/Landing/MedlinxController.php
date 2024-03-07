<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Media;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Team;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MedlinxController extends Controller
{
    public function index(){


        $app = CmsApp::find(1);


        $path = public_path('publishfile/medlinx.json');
        $dataget = file_get_contents($path);

        $data = json_decode($dataget, true);

        $news = $data['news'];

        $dataChunks = collect($data['mark1'])->chunk(4);
        $porto2Chunks = collect($data['mark2'])->chunk(4);
        $diliputChunk = collect($data['diliput'])->chunk(4);
        $mitraChunk = collect($data['mitra'])->chunk(4);

        return view('medlinx.landing.app',compact('data','dataChunks','porto2Chunks','diliputChunk','mitraChunk','app','news'));
    }

    public function sendMessage(Request $req){
        if (is_null($req->subject)) {
            $subject = 'Umum - '.$req->type;
            $to = 'customercare@medlinx.co.id';
        }else{
            $subject = 'Solusi - '.$req->subject;
            $to = 'sales@medlinx.co.id';
        }

        try {
            Mail::send('mail.template', ['data' => $req], function ($message) use ($req, $to, $subject) {
                $message->subject($subject);
                $message->from(env('MAIL_USERNAME'), env('MAIL_ALIAS'));
                $message->to($to);
            });

            $ret = [
                'status' => true,
                'message' => 'success',
            ];

        } catch (\Exception $e) {
            $ret = [
                'status' => false,
                'message' => $e->getMessage(),
            ];
        }

        return response()->json($ret);
    }

    public function NewsDetail($slug){
        $article = Article::where('slug',$slug)->first();
        $cms = CmsApp::find($article->app_id);
        return view('medlinx.landing.detail-news',compact('article','cms'));
    }
    public function prevDetailNews($slug){
        $article = Article::where('slug',$slug)->first();
        $app = CmsApp::find($article->app_id);
        $type = "prev";
        return view('medlinx.landing.detail-news',compact('article','app','type'));
    }
    public function DetailNewsPublis($slug){

        $path = public_path('publishfile/medlinx.json');
        $dataget = file_get_contents($path);

        $data = json_decode($dataget, true);

        $filteredNews = array_filter($data['news'], function ($item) use ($slug) {
            return $item['slug'] == $slug;
        });

        $article = reset($filteredNews);
        $cms = $data['cms'];

        return view('medlinx.landing.detail-news',compact('article','cms'));
    }
    public function ListNews($slug){
        $data['title'] = 'News';
        $data['page'] = 'news-update';
        $path = public_path('publishfile/medlinx.json');
        $dataget = file_get_contents($path);

        $data += json_decode($dataget, true);

        return view('medlinx.landing.all-news',$data);
    }
}
