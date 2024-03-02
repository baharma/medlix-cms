<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\IzidokController;
use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Keunggulan;
use App\Models\KeunggulanList;
use App\Models\MainAbout;
use App\Models\MainAppHero;
use App\Models\MainArticle;
use App\Models\MainCmsApp;
use App\Models\MainEvent;
use App\Models\MainKeunggulan;
use App\Models\MainKeunggulanList;
use App\Models\MainMedia;
use App\Models\MainPlan;
use App\Models\MainPlanDetail;
use App\Models\MainPlanFeatue;
use App\Models\MainTestimoni;
use App\Models\Media;
use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use App\Models\Testimoni;
use App\Repositories\Preview\PreviewRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreviewController extends Controller
{
    public $app_id, $repository;

    public function __construct(PreviewRepository $repo)
    {
        $this->repository = $repo;
    }

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
            $this->copyCMS($app_id);
            if ($app_id == 1) {
            }
            if ($app_id == 2) {
                $this->copyAbout($app_id);
                $this->copyPlan($app_id);
                $this->copyTestimony($app_id);
                $this->copyNews($app_id);
                $this->copyEvent($app_id);
                $this->imgSliderIzidok();
                $this->copyHero($app_id);
                $this->copyKeunggun($app_id);
                session()->push('publish', ['message' => "Successful publish Izidok"]);
                return to_route('cms.set',$app_id);

            }
            if ($app_id == 3) {
            }
            DB::commit();
            dd('success');

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }

    }
    public function copyCMS($app_id){
        $mainCMS = MainCmsApp::find($app_id);
        if($mainCMS){
            $mainCMS->delete();
        }
        $cmsToCopy = CmsApp::find($app_id);

        $cms  = new MainCmsApp();
        $cms->fill($cmsToCopy->attributesToArray());
        $cms->save();
    }
    public function copyPlan($app_id){
        $plans = Plan::where('app_id',$app_id)->get();
        foreach ($plans as $plan) {
            $this->repository->deletePlanAndAddMain($plan);
        }
        foreach (PlanDetail::all() as $detail) {
            $this->repository->deletePlanDetailAddMain($detail);
        }
        foreach (PlanFeatue::all() as $feature) {
            $this->repository->deletePlanFeatureAddMain($feature);
        }
    }
    public function copyAbout($app_id){
        $abouts = About::where('app_id',$app_id)->get();

        foreach ($abouts as $about) {
            $copyAbout =  new MainAbout();

            $copyAbout->fill($about->attributesToArray());
            $copyAbout->save();
        }
    }
    public function copyTestimony($app_id){
        $testimoni = Testimoni::where('app_id',$app_id)->get();
        foreach ($testimoni as $testi) {
            $this->repository->deleteAddTestimomni($testi);
        }
    }
    public function copyNews($app_id){
        $newses = Article::where('app_id',$app_id)->get();
        foreach ($newses as $news) {
            $this->repository->deleteAddnewMain($news);
        }
    }
    public function copyEvent($app_id){
        $allEvent = Event::where('app_id',$app_id)->get();
        foreach ($allEvent as $event) {
           $copyEvent = new MainEvent();
           $copyEvent->fill($event->attributesToArray());
           $copyEvent->save();
        }
    }
    public function imgSliderIzidok(){
        $allMedia = Media::where(['title'=>'izidok','mark'=>'slider'])->get();
        foreach ($allMedia as $media) {
           $copyMedia = new MainMedia();
           $copyMedia->fill($media->attributesToArray());
           $copyMedia->save();
        }
    }
    public function copyHero($app_id){
        $heros = AppHero::where('app_id',$app_id)->first();
        $cms  = new MainAppHero();
        $cms->fill($heros->attributesToArray());
        $cms->save();
    }
    public function copyKeunggun($app_id){
        $keunggulan = Keunggulan::where('app_id',$app_id)->first();
        $this->repository->deleteAddKeunggulan($keunggulan);

        $list = KeunggulanList::where('keunggulan_id',$keunggulan->id)->get();
        foreach ($list as $value) {
            $this->repository->deleteAddKeunggulanListMain($value);
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
