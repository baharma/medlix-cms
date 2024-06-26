<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Keunggulan;
use App\Models\Testimoni;
use App\Models\Media;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Team;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\Session;

class PublishController extends Controller
{
    public function publishIzidok(){
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
            'social'=> json_decode($contact->extend),
            'fav'   => asset($contact->favicon)
        ];
       try {
            $directoryPath = public_path('publishfile');

            // Create the directory if it doesn't exist
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true); // Create directory recursively
            }

            $filePath = 'publishfile/izidok.json';

            // Check if the file exists
            $path = public_path('publishfile/izidok.json');
            if (file_exists($path)) {
                // If the file exists, delete it
                unlink($path);
            }


            // Encode the new data to JSON format
            $jsonData = json_encode($data);
            file_put_contents($filePath, $jsonData);

            session()->push('publish', ['message' => "Successful Publish Izidok Data"]); 
            return redirect()->route('cms.set',2);
        } catch (\Exception $e) {
            session()->push('errpublish', ['message' => "Successful Publish Izidok Data"]); 
            return redirect()->route('cms.set',2);
        }
    }
    public function publishIziklaim(){
        $hero       = AppHero::where('app_id',3)->first();
        $heroMini   = json_decode($hero->extend,true);
        $visiMisi   = VisiMisi::where('app_id',3)->first();
        $teamUp     = Team::where('up_lv',1)->where('app_id',3)->get();
        $teamDown   = Team::where('up_lv',0)->where('app_id',3)->get();
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
            'fav'   => asset($contact->favicon),
            'address'   => $contact->app_address,
            'mail'  => $contact->app_mail,
            'phone' => $contact->app_phone,
            'wa'    => $contact->app_wa,
            'gmaps' => $contact->app_gmaps
        ];
        try {
            $directoryPath = public_path('publishfile');

            // Create the directory if it doesn't exist
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true); // Create directory recursively
            }

            $filePath = 'publishfile/iziklaim.json';

            // Check if the file exists
            $path = public_path('publishfile/iziklaim.json');
            if (file_exists($path)) {
                // If the file exists, delete it
                unlink($path);
            }

            // Encode the new data to JSON format
            $jsonData = json_encode($data);
            file_put_contents($filePath, $jsonData);

             session()->push('publish', ['message' => "Successful Publish Iziklaim Data"]); 
            return redirect()->route('cms.set',3);
        } catch (\Exception $e) {
            session()->push('errpublish', ['message' => "Successful Publish Iziklaim Data"]); 
            return redirect()->route('cms.set',3);
        }
    }

    public function PublisMedlinx(){

            $data['hero'] = collect(AppHero::where('app_id',1)->get())->map(function($hero){
                return [
                    'image' => $hero->image,
                    'title' => $hero->title,
                    'subtitle' => $hero->subtitle,
                    'extend' => $hero->extend,
                ];
            });
            $cms = CmsApp::find(1);
            $data['cms'] = [
                'app_name'=>$cms->app_name,
                'app_url'=>$cms->app_url,
                'logo'=>$cms->logo,
                'app_address'=>$cms->app_address,
                'app_mail'=>$cms->app_mail,
                'app_phone'=>$cms->app_phone,
                'app_wa'=>$cms->app_wa,
                'app_gmaps'=>$cms->app_gmaps,
                'favicon'=>$cms->favicon,
                'extend'=>$cms->extend
            ];
            $data['solution'] = collect(Solution::where('app_id',1)->get())->map(function($event){
                return [
                    'title'=>$event->title,
                    'sub_title'=>$event->sub_title,
                    'extend'=>$event->extend
                ];
            });

            $data['team'] = collect(Team::where('app_id',1)->get())->map(function($event){
                $social = $event->extend;
            
                $s = json_decode($social, true);
                $twitter = $s['twitter'];
                $instagram = $s['instagram'];
                $linkedin = $s['linkedin'];
                $facebook = $s['facebook'];
            
                $check = [
                    'fb' => $s['fb_check'],
                    'ig' => $s['ig_check'],
                    'in' => $s['in_check'],
                    'tw' => $s['tw_check'],
                ];
                return [
                    'image'=>$event->image,
                    'name'=>$event->name,
                    'title'=>$event->title,
                    'up_lv'=>$event->up_lv,
                    'twitter'=>$twitter,
                    'linkedin'=>$linkedin,
                    'instagram'=>$instagram,
                    'facebook' => $facebook,
                    'check' => $check
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

            $data['news'] = Article::where(function ($query) {
                $query->where('app_id', '=', 1)
                      ->orWhere('app_id', '=', 0);
            })->get();

        try {
            $directoryPath = public_path('publishfile');

            // Create the directory if it doesn't exist
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0777, true); // Create directory recursively
            }

            $filePath = 'publishfile/medlinx.json';

            // Check if the file exists
            $path = public_path('publishfile/medlinx.json');
            if (file_exists($path)) {
                // If the file exists, delete it
                unlink($path);
            }

            // Encode the new data to JSON format
            $jsonData = json_encode($data);
            file_put_contents($filePath, $jsonData);
            
            session()->push('publish', ['message' => "Successful Publish Medlinx Data"]); 
            return redirect()->route('cms.set',1);
        } catch (\Exception $e) {
            session()->push('errpublish', ['message' => "Successful Publish Medlinx Data"]); 
            return redirect()->route('cms.set',1);
        }

    }
}
