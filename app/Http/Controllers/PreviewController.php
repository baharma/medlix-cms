<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\IzidokController;
use App\Livewire\Pages\Produk\Produk;
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
use App\Models\Product;
use App\Models\Solution;
use App\Models\Team;
use App\Models\Testimoni;
use App\Models\VisiMisi;
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
        }elseif($slug == 'medlinx'){
            return to_route('priview-medlinx');
        }elseif($slug=='iziklaim'){
            $data['title'] = 'Home';
            $data += $this->iziklaim();
            return view('preview.iziklaim.landing',$data);
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

        // DB::beginTransaction();
        // try {
            $this->copyCMS($app_id);
            if ($app_id == 1) {
                $this->copyHero($app_id);
                $this->copysolution($app_id);
                $this->copyTestimony($app_id);
                $this->copyVisiMisi($app_id);
                $this->copyTeam(0);
                $this->copyProduk($app_id);
                $this->copyHero($app_id);
                $this->copyMediaMedlinx();
                session()->push('publish', ['message' => "Successful publish Medlinx"]);
                return to_route('cms.set',$app_id);
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
                $this->copyTeamIziklaim();
                $this->copyVisiMisi($app_id);
                $this->copyHero($app_id);
                $this->copyEvent($app_id);
                $this->copysolution($app_id);
                $this->copyMediaIziklaim();
                session()->push('publish', ['message' => "Successful publish IziKlaim"]);
                return to_route('cms.set',$app_id);
            }
        //     DB::commit();
        //     dd('success');

        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     dd($th->getMessage());
        // }

    }
    public function copyProduk($app_id){
        $produk = Product::where('app_id',$app_id)->get();

        foreach($produk as $item){
            $this->repository->deleteAddProduct($item);
        }
    }
    public function copyTeam($app_id){
        $team = Team::where('app_id',$app_id)->get();
        foreach($team as $data){
            $this->repository->deleteAddTeam($data);
        }
    }
    public function copyVisiMisi($app_id){
        $mainVisiMisi = VisiMisi::where('app_id',$app_id)->get();
        foreach($mainVisiMisi as $data){
            $this->repository->deleteAddVisiMisi($data);
        }
    }

    public function copyMediaMedlinx(){
        $mark1 = Media::where('mark','porto1')->get();
        $mark2= Media::where('mark','porto2')->get();
        $mitra = Media::where('mark','mitra')->get();
        $diliput = Media::where('mark','diliput')->get();

        foreach($mark1 as $data){
            $this->repository->deleteAddMedia($data);
        }
        foreach($mark2 as $data){
            $this->repository->deleteAddMedia($data);
        }
        foreach($mitra as $data){
            $this->repository->deleteAddMedia($data);
        }
        foreach($diliput as $data){
            $this->repository->deleteAddMedia($data);
        }
    }

    public function copysolution($app_id){
        $solition = Solution::where('app_id',$app_id)->get();
        foreach($solition as $item){
            $this->repository->deleteAddSolution($item);
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
            $this->repository->deleteAddAbout($about);
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
            $this->repository->deleteAddArticle($news);
        }
    }
    public function copyEvent($app_id){

        $allEvent = Event::where('app_id',$app_id)->get();

        foreach ($allEvent as $event) {
            $this->repository->deleteAddEvent($event);
        }
    }
    public function imgSliderIzidok(){
        $allMedia = Media::where(['title'=>'izidok','mark'=>'slider'])->get();
        foreach ($allMedia as $media) {
            $this->repository->deleteAddMedia($media);
        }
    }
    public function copyHero($app_id){
        $heros = AppHero::where('app_id',$app_id)->first();
        $this->repository->deleteAddHero($heros);
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

    public function copyTeamIziklaim(){
        $teamUp     = Team::where('up_lv',1)->get();
        $teamDown   = Team::where('up_lv',0)->get();

        foreach($teamUp as $data){
            $this->repository->deleteAddTeam($data);
        }
        foreach($teamDown as $data){
            $this->repository->deleteAddTeam($data);
        }
    }
    public function copyMediaIziklaim(){
        $prov = Media::whereIn('mark',['provider'])->get();
        $provimg = Media::whereIn('title',['provider','client','maps'])->where(['mark'=>'slider'])->get();
        foreach ($prov as $media) {
            $this->repository->deleteAddMedia($media);
        }
        foreach ($provimg as $media) {
            $this->repository->deleteAddMedia($media);
        }
    }

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
