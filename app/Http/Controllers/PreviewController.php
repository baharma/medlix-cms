<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\IzidokController;
use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Keunggulan;
use App\Models\MainCmsApp;
use App\Models\Media;
use App\Models\Plan;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreviewController extends Controller
{
    public function index($slug){
        if($slug == 'izidok'){
            $data['title'] = 'Home';

            $data += $this->izidok();
            return view('preview.izidok.izidok-app',$data);
        }
    }
    public function newsUpdate(){
       
        $data['title'] = 'Home';
        $data['page'] = 'news-update';
        $data += $this->izidok();
        return view('preview.izidok.landing.others.news-update', $data);
       
    }

    public function publish(Request $request){
        $app = CmsApp::where('app_name',$request->app)->first();
        $app_id = $app->id;
        DB::beginTransaction();
        try {
            $mainCMS = MainCmsApp::find($app_id);
            if($mainCMS){
                $mainCMS->delete();
            }
            $cmsToCopy = CmsApp::find($app_id);
            
            $cms  = new MainCmsApp();
            $cms->fill($cmsToCopy->attributesToArray());
            $cms->save();

            DB::commit();
            dd($cms);

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

    }



    public function newsUpdateDetail($slug){
        $data = [
            'title' => 'News & Update Detail',
            'page' => 'news-update'
        ];
        $data += $this->news($slug);
        return view('preview.izidok.landing.others.news-detail', $data);
    }
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
            'social'=> json_decode($contact->extend,true),
            'fav'   => asset($contact->favicon)
        ];

        $data += [
            'news_title' => $article->title,
            'news_details' => $article->description
        ];
        return $data;
    }

    public function izidok(){
        
        $hero = AppHero::where('app_id',2)->first();
        $btnHero = json_decode($hero?->extend,true);
        $data['hero'] = [
            'image'=> asset($hero->image),
            'title' => $hero->title,
            'subtitle' => $hero->subtitle,
            'button_url' => $btnHero[0]['val']??null
        ];
        $about =  About::where('app_id',2)->first();
        $data['about'] = [
            'image' => asset($about->image),
            'title' => $about->title,
            'sub_title'=> json_decode($about->list,true)
        ];
        $slider  = Media::where('title','izidok')->get();
        $slide = [];
        foreach ($slider as $value) {
            $slide[] = [
                'image' => asset($value->images)
            ];
        }
        $data['slider'] = $slide;

        $keunggulan = Keunggulan::with('KeunggulanList')->where('app_id',2)->first();
        $keunggulanList =  [];
        foreach ($keunggulan->KeunggulanList as $value) {
            $keunggulanList[] = [
                'title' =>$value->title,
                'image' => asset($value->image)
            ];
        }
        $data['keunggulan'] = [
            'title' => $keunggulan->title,
            'desc'  => $keunggulan->description,
            'list'  => $keunggulanList
        ];
        $data['maps']  = [
            'title' => $keunggulan->image_title,
            'image' => asset($keunggulan->image)
        ];

        $article = Article::where('app_id',2)->get();
        $news = [];
        foreach ($article as $value) {
            $news[] = [
                'title' => $value->title,
                'images' => asset($value->thumbnail),
                'desc' => $value->description,
                'check' => $value->check,
                'slug' => $value->slug
            ];
        }

        $data['news'] = $news;

        $plan = Plan::where('app_id',2)
                    ->with('details','details.feature')
                    ->get();
        $pricing = [];
        foreach ($plan as $value) {
            $details  = $value->details;
            $detail = [];
            foreach ($details as $d) {
                $detail[] = $d->feature->name;
            }

            $pricing[] =  [
                'id'   => $value->id,
                'name' => $value->name,
                'duration' => $value->duration,
                'amount'=> split_number($value->amount),
                'best_seller'=> $value->best_seller,
                'details' => $detail
            ];
        }
        $data['price'] = $pricing;

        $ev  = Event::where('app_id',2)->get();
        $event = [];
        foreach ($ev as $e) {
            $event[] = [
                'image' => asset($e->image),
                'name'  => $e->name
            ];
        }
        $data['event'] =  $event;
        $testi = [];
        foreach (Testimoni::where('app_id',2)->get() as $t) {
            $testi[]  = [
                'testi' => $t->testi,
                'by'    => $t->testi_by,
                'title' => $t->testi_by_title,
                'img'   => asset($t->testi_by_img)
            ];
        }

        $data['testi']  = $testi;
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
            'social'=> json_decode($contact->extend,true),
            'fav'   => asset($contact->favicon)
        ];

       return $data;
    }
}
