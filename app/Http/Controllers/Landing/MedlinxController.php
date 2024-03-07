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
        $data['hero'] = AppHero::where('app_id',1)->get();
        $data['solution'] = Solution::where('app_id',1)->get();
        $data['team'] = Team::where('app_id',0)->get();
        $data['visimisi'] = VisiMisi::where('app_id',1)->first();
        $data['produk'] = Product::where('app_id',1)->get();
        $data['mark1'] = Media::where('mark','porto1')->get();
        $data['mark2'] = Media::where('mark','porto2')->get();
        $data['why'] = Media::where('mark','why_us')->get();
        $data['penghargaan'] = Media::where('mark','penghargaan')->get();
        $data['testimoni'] = Testimoni::where('app_id',1)->get();
        $data['mitra'] = Media::where('mark','mitra')->get();
        $data['diliput'] = Media::where('mark','diliput')->get();
        $data['news'] = Article::where('app_id',1)->orWhere('app_id',0)->get();
        $dataChunks = $data['mark1']->chunk(4);
        $porto2Chunks = $data['mark2']->chunk(4);
        $app = CmsApp::find(1);
        $diliputChunk = $data['diliput']->chunk(4);
        $mitraChunk = $data['mitra']->chunk(4);
        return view('medlinx.landing.app',compact('data','dataChunks','porto2Chunks','diliputChunk','mitraChunk','app'));
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
        $cms = CmsApp::find($article->app_id);
        $prev = "prev";
        return view('medlinx.landing.detail-news',compact('article','cms'));
    }
}
