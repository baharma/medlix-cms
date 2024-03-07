<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Keunggulan;

use App\Models\Media;
use App\Models\Plan;

use App\Models\Product;
use App\Models\Solution;
use App\Models\Team;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use App\Repositories\Preview\PreviewRepository;


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
        }elseif($slug == 'medlinx'){
            $data = $this->priviewMadlinx();
            $dataChunks = $data['mark1']->chunk(4);
            $porto2Chunks = $data['mark2']->chunk(4);
            $app = CmsApp::find(1);
            $news = Article::where(function ($query) {
                $query->where('app_id', '=', 1)
                      ->orWhere('app_id', '=', 0);
            })->get();
            $diliputChunk = $data['diliput']->chunk(4);
            $mitraChunk = $data['mitra']->chunk(4);
            $type = 'prev';
            return view('medlinx.landing.app',compact('data','news','dataChunks','porto2Chunks','diliputChunk','mitraChunk','app','type'));
        }elseif($slug=='iziklaim'){
            $data['title'] = 'Home';
            $data += $this->iziklaim();
            return view('preview.iziklaim.landing',$data);
        }
    }
    public function newsUpdate($cms){
        $data['title'] = 'News';
        $data['page'] = 'news-update';
        $data += $this->izidok();
        if($cms == 'izidok'){
            return view('preview.izidok.landing.others.news-update', $data);
        }elseif($cms=='iziklaim'){
            return view('preview.iziklaim.landing.news-update', $data);
        }

    }
    public function priviewMadlinx(){
        $data['hero'] = collect(AppHero::where('app_id',1)->get())->map(function($hero){
            return [
                'image' => $hero->image,
                'title' => $hero->title,
                'subtitle' => $hero->subtitle,
                'extend' => $hero->extend,
            ];
        });

        $data['solution'] = collect(Solution::where('app_id',1)->get())->map(function($event){
            return [
                'title'=>$event->title,
                'sub_title'=>$event->sub_title,
                'extend'=>$event->extend
            ];
        });

        $data['team'] = collect(Team::where('app_id',0)->get())->map(function($event){
            return [
                'image'=>$event->image,
                'name'=>$event->name,
                'title'=>$event->title,
                'up_lv'=>$event->up_lv
            ];
        });

        $data['visimisi'] = collect(VisiMisi::where('app_id',1)->get())->map(function($event){
            return  [
                'visi'=>$event->visi,
                'misi'=>$event->misi,
                'visi_img'=>$event->visi_img ?? null,
                'misi_img'=>$event->misi_img ?? null,
                'detail_img'=>$event->detail_img ?? null
            ];
        })->first();


        $data['produk'] = collect( Product::where('app_id',1)->get())->map(function($event){
            return [
                'image'=>$event->image,
                'logo'=>$event->logo,
                'text'=>$event->text,
                'url'=>$event->url
            ];
        });

        $data['mark1'] = collect(Media::where('mark', 'porto1')->get())->map(function ($item) {
            return [
                'title'=>$item->title,
                'text'=>$item->text,
                'images'=>$item->images,
                'url'=>$item->url,
                'mark'=>$item->mark
            ];
        });

        $data['mark2'] = collect(Media::where('mark', 'porto2')->get())->map(function ($item) {
            return [
                'title'=>$item->title,
                'text'=>$item->text,
                'images'=>$item->images,
                'url'=>$item->url,
                'mark'=>$item->mark
            ];
        });

        $data['why'] = collect(Media::where('mark', 'why_us')->get())->map(function ($item) {
            return [
                'title'=>$item->title,
                'text'=>$item->text,
                'images'=>$item->images,
                'url'=>$item->url,
                'mark'=>$item->mark
            ];
        });

        $data['penghargaan'] = collect(Media::where('mark', 'penghargaan')->get())->map(function ($item) {
            return [
                'title'=>$item->title,
                'text'=>$item->text,
                'images'=>$item->images,
                'url'=>$item->url,
                'mark'=>$item->mark
            ];
        });

        $data['testimoni'] = collect(Testimoni::where('app_id', 1)->get())->map(function ($item) {
            return [
                'testi'=>$item->testi,
                'testi_by'=>$item->testi_by,
                'testi_by_title'=>$item->testi_by_title,
                'testi_by_img'=>$item->testi_by_img
            ];
        });

        $data['mitra'] = collect(Media::where('mark', 'mitra')->get())->map(function ($item) {
            return [
                'title'=>$item->title,
                'text'=>$item->text,
                'images'=>$item->images,
                'url'=>$item->url,
                'mark'=>$item->mark
            ];
        });

        $data['diliput'] = collect(Media::where('mark', 'diliput')->get())->map(function ($item) {
            return [
                'title'=>$item->title,
                'text'=>$item->text,
                'images'=>$item->images,
                'url'=>$item->url,
                'mark'=>$item->mark
            ];
        });

        $data['news'] = collect(Article::where('app_id', 1)->orWhere('app_id', 0)->get())->map(function ($item) {
            return [
                'slug'=>$item->slug,
                'title'=>$item->title,
                'thumbnail'=>$item->thumbnail,
                'description'=>$item->description,
                'check'=>$item->check
            ];
        });
        return $data;
    }
    // public function publish(Request $request){
    //     $app = CmsApp::where('app_name',$request->app)->first();
    //     $app_id = $app->id;
    //         $this->copyCMS($app_id);
    //         if ($app_id == 1) {
    //             $this->copyHero($app_id);
    //             $this->copysolution($app_id);
    //             $this->copyTestimony($app_id);
    //             $this->copyVisiMisi($app_id);
    //             $this->copyTeam(0);
    //             $this->copyProduk($app_id);
    //             $this->copyHero($app_id);
    //             $this->copyMediaMedlinx();
    //             session()->push('publish', ['message' => "Successful publish Medlinx"]);
    //             return to_route('cms.set',$app_id);
    //         }
    //         if ($app_id == 2) {
    //             $this->copyAbout($app_id);
    //             $this->copyPlan($app_id);
    //             $this->copyTestimony($app_id);
    //             $this->copyNews($app_id);
    //             $this->copyEvent($app_id);
    //             $this->imgSliderIzidok();
    //             $this->copyHero($app_id);
    //             $this->copyKeunggun($app_id);
    //             session()->push('publish', ['message' => "Successful publish Izidok"]);
    //             return to_route('cms.set',$app_id);
    //         }
    //         if ($app_id == 3) {
    //             $this->copyTeamIziklaim();
    //             $this->copyVisiMisi($app_id);
    //             $this->copyHero($app_id);
    //             $this->copyEvent($app_id);
    //             $this->copysolution($app_id);
    //             $this->copyMediaIziklaim();
    //             session()->push('publish', ['message' => "Successful publish IziKlaim"]);
    //             return to_route('cms.set',$app_id);
    //         }
    // }
    // public function copyProduk($app_id){
    //     $produk = Product::where('app_id',$app_id)->get();

    //     foreach($produk as $item){
    //         $this->repository->deleteAddProduct($item);
    //     }
    // }
    // public function copyTeam($app_id){
    //     $team = Team::where('app_id',$app_id)->get();
    //     foreach($team as $data){
    //         $this->repository->deleteAddTeam($data);
    //     }
    // }
    // public function copyVisiMisi($app_id){
    //     $mainVisiMisi = VisiMisi::where('app_id',$app_id)->get();
    //     foreach($mainVisiMisi as $data){
    //         $this->repository->deleteAddVisiMisi($data);
    //     }
    // }
    // public function copyMediaMedlinx(){
    //     $mark1 = Media::where('mark','porto1')->get();
    //     $mark2= Media::where('mark','porto2')->get();
    //     $mitra = Media::where('mark','mitra')->get();
    //     $diliput = Media::where('mark','diliput')->get();
    //     $why = Media::where('mark','why_us')->get();

    //     foreach($mark1 as $data){
    //         $this->repository->deleteAddMedia($data);
    //     }
    //     foreach($why as $data){
    //         $this->repository->deleteAddMedia($data);
    //     }
    //     foreach($mark2 as $data){
    //         $this->repository->deleteAddMedia($data);
    //     }
    //     foreach($mitra as $data){
    //         $this->repository->deleteAddMedia($data);
    //     }
    //     foreach($diliput as $data){
    //         $this->repository->deleteAddMedia($data);
    //     }
    // }
    // public function copysolution($app_id){
    //     $solition = Solution::where('app_id',$app_id)->get();
    //     foreach($solition as $item){
    //         $this->repository->deleteAddSolution($item);
    //     }
    // }

    // public function copyCMS($app_id){
    //     $mainCMS = MainCmsApp::find($app_id);
    //     $cmsToCopy = CmsApp::find($app_id);
    //     if($mainCMS){
    //         $mainCMS->update($cmsToCopy->attributesToArray());
    //     }else {
    //         $cms  = new MainCmsApp();
    //         $cms->fill($cmsToCopy->attributesToArray());
    //         $cms->save();
    //     }
    // }
    // public function copyPlan($app_id){
    //     $plans = Plan::where('app_id',$app_id)->get();
    //     foreach ($plans as $plan) {
    //         $this->repository->deletePlanAndAddMain($plan);
    //     }
    //     foreach (PlanDetail::all() as $detail) {
    //         $this->repository->deletePlanDetailAddMain($detail);
    //     }
    //     foreach (PlanFeatue::all() as $feature) {
    //         $this->repository->deletePlanFeatureAddMain($feature);
    //     }
    // }
    // public function copyAbout($app_id){
    //     $abouts = About::where('app_id',$app_id)->get();

    //     foreach ($abouts as $about) {
    //         $this->repository->deleteAddAbout($about);
    //     }
    // }
    // public function copyTestimony($app_id){
    //     $testimoni = Testimoni::where('app_id',$app_id)->get();
    //     foreach ($testimoni as $testi) {
    //         $this->repository->deleteAddTestimomni($testi);
    //     }
    // }
    // public function copyNews($app_id){
    //     $newses = Article::where('app_id',$app_id)->get();
    //     foreach ($newses as $news) {
    //         $this->repository->deleteAddArticle($news);
    //     }
    // }
    // public function copyEvent($app_id){

    //     $allEvent = Event::where('app_id',$app_id)->get();

    //     foreach ($allEvent as $event) {
    //         $this->repository->deleteAddEvent($event);
    //     }
    // }
    // public function imgSliderIzidok(){
    //     $allMedia = Media::where(['title'=>'izidok','mark'=>'slider'])->get();
    //     foreach ($allMedia as $media) {
    //         $this->repository->deleteAddMedia($media);
    //     }
    // }
    // public function copyHero($app_id){
    //     $heros = AppHero::where('app_id',$app_id)->get();
    //     foreach ($heros as $key => $value) {
    //         $mainCMS = MainAppHero::find($value->id);
    //         if($mainCMS){
    //             $mainCMS->update($value->attributesToArray());
    //         }else {
    //             $cms  = new MainAppHero();
    //             $cms->fill($value->attributesToArray());
    //             $cms->save();
    //         }
    //     }
    // }
    // public function copyKeunggun($app_id){
    //     $keunggulan = Keunggulan::where('app_id',$app_id)->first();
    //     $this->repository->deleteAddKeunggulan($keunggulan);

    //     $list = KeunggulanList::where('keunggulan_id',$keunggulan->id)->get();

    //     foreach ($list as $value) {
    //         $this->repository->deleteAddKeunggulanListMain($value);
    //     }
    // }
    // public function newsUpdateDetail($cms,$slug){
    //     $data = [
    //         'title' => 'News & Update Detail',
    //         'page' => 'news-update'
    //     ];
    //     $data += $this->news($slug);
    //     if($cms=='izidok'){
    //         return view('preview.izidok.landing.others.news-detail', $data);
    //     }elseif($cms=='iziklaim'){
    //         return view('preview.iziklaim.landing.news-details', $data);
    //     }
    // }
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
    // public function copyTeamIziklaim(){
    //     $teamUp     = Team::where('up_lv',1)->get();
    //     $teamDown   = Team::where('up_lv',0)->get();

    //     foreach($teamUp as $data){
    //         $this->repository->deleteAddTeam($data);
    //     }
    //     foreach($teamDown as $data){
    //         $this->repository->deleteAddTeam($data);
    //     }
    // }
    // public function copyMediaIziklaim(){
    //     $prov = Media::whereIn('mark',['provider'])->get();
    //     $provimg = Media::whereIn('title',['provider','client','maps'])->where(['mark'=>'slider'])->get();
    //     foreach ($prov as $media) {
    //         $this->repository->deleteAddMedia($media);
    //     }
    //     foreach ($provimg as $media) {
    //         $this->repository->deleteAddMedia($media);
    //     }
    // }
    public function iziklaim(){
        $hero       = AppHero::where('app_id',3)->first();
        $heroMini   = json_decode($hero->extend,true);
        $visiMisi   = VisiMisi::where('app_id',3)->first();
        $teamUp     = Team::where('up_lv',1)->get();
        $teamDown   = Team::where('up_lv',0)->get();
        $team       = [];
        $team2       = [];
        foreach ($teamUp as $value) {
            $team[] = [
                'image' => asset($value->image),
                'name'  => $value->name,
                'title' => $value->title
            ];
        }
        foreach ($teamDown as $value) {
            $team2[] = [
                'image' => asset($value->image),
                'name'  => $value->name,
            ];
        }
        $sol = Solution::where('app_id',3)->get();
        $solution = [];

      foreach ($sol as $s) {
            $extend   = json_decode($s->extend,true);
            if(isset($extend['button'])){
                $button = [
                    'name'  => $extend['button']['name'],
                    'val'   => $extend['button']['val']
                ];
            }else{
                $button =  false;
            }

            $solution[] = [
                'title' => $s->title,
                'sub_title' => $s->sub_title,
                'image' => asset($extend['image']),
                'miniImg' => isset($extend['mini_image']) ? asset($extend['mini_image']) : null,
                'icon'    => isset($extend['icon']) ? asset($extend['icon']) : null,
                'position'  => ($extend['img_postion']),
                'default'  => ($extend['defauult']),
                'button'    => $button

            ];
        }

        $provider = [];
        $prov = Media::whereIn('mark',['provider'])->get();
        foreach ($prov as $key => $value) {
            $provider[] = [
                'mark'  => $value->mark,
                'title' => $value->title,
                'value' => num($value->text)
            ];
        }
        $providerImg = [];
        $provimg = Media::whereIn('title',['provider','client','maps'])->where(['mark'=>'slider'])->get();
        foreach ($provimg as $key => $value) {
            $providerImg[$value->title][] = [
                'images' => asset($value->images),
            ];
        }
        $event = [];
        $evt    = Event::where('app_id',3)->get();
        foreach ($evt as $val) {
            $event[] = [
                'name'  => $val->name,
                'image' => asset($val->image)
            ];
        }
        $contact = CmsApp::find(3);
        $data['hero']  = [
            'image'         => asset($hero->image),
            'title'         => $hero->title,
            'image_mini'    => asset($heroMini['sub_image'])
        ];
        $data['visiMisi']  = [
            'visi'  => $visiMisi->visi,
            'misi'  => $visiMisi->misi
        ];
        $data['team'] = ['up'=>$team,'down'=>$team2];
        $data['solution'] = $solution;
        $data['provider'] =  ['text'=>$provider,'slider'=>$providerImg];
        $data['event']  = $event;
        $article = Article::where('app_id',3)->orWhere('app_id',0)->get();
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
        $data['app'] = [
            'name'  => $contact->app_name,
            'url'   => $contact->app_url,
            'logo'  => $contact->logo,
            'address'   => $contact->app_address,
            'mail'  => $contact->app_mail,
            'phone' => $contact->app_phone,
            'wa'    => $contact->app_wa,
            'gmaps' => $contact->app_gmaps
        ];

        return $data;
    }
}
