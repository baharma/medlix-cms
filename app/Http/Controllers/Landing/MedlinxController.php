<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\MainAppHero;
use App\Models\MainArticle;
use App\Models\MainCmsApp;
use App\Models\MainMedia;
use App\Models\MainProduct;
use App\Models\MainSolution;
use App\Models\MainTeam;
use App\Models\MainTestimoni;
use App\Models\MainVisiMisi;
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
        $data['hero'] = MainAppHero::where('app_id',1)->get();
        $data['solution'] = MainSolution::where('app_id',1)->get();
        $data['team'] = MainTeam::where('app_id',0)->get();
        $data['visimisi'] = MainVisiMisi::where('app_id',1)->first();
        $data['produk'] = MainProduct::where('app_id',1)->get();
        $data['mark1'] = MainMedia::where('mark','porto1')->get();
        $data['mark2'] = MainMedia::where('mark','porto2')->get();
        $data['why'] = MainMedia::where('mark','why_us')->get();
        $data['penghargaan'] = MainMedia::where('mark','penghargaan')->get();
        $data['testimoni'] = MainTestimoni::where('app_id',1)->get();
        $data['mitra'] = MainMedia::where('mark','mitra')->get();
        $data['diliput'] = MainMedia::where('mark','diliput')->get();
        $data['news'] = MainArticle::where('app_id',1)->orWhere('app_id',0)->get();
        $dataChunks = $data['mark1']->chunk(4);
        $porto2Chunks = $data['mark2']->chunk(4);
        $app = MainCmsApp::find(1);
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
