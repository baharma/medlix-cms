<?php

namespace App\Livewire\Pages;

use App\Models\CmsApp as ModelsCmsApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('APP')]

class CmsApp extends Component
{
    use WithFileUploads;

    public $app_name;
    public $app_url;
    public $logo;
    public $favico;
    public $facebook;
    public $youtube;
    public $instagram;
    public $twitter;
    public $linkedin;
    public $app_hero_img;
    public $app_address;
    public $app_mail;
    public $app_phone;
    public $app_wa;
    public $app_gmaps;

    protected $rules = [
        'app_name' => 'required|min:6',
        'app_url' => 'required|url',
    ];
    public function mount()
    {

        $cms = $this->renderRefresh();
        // Set the properties from $cms
        if ($cms) {
            $this->app_name = $cms->app_name??'';
            $this->app_url = $cms->app_url??'';
            $this->logo = $cms->logo??"";
            $this->app_address = $cms->app_address??"";
            $this->app_mail = $cms->app_mail??'';
            $this->app_phone = $cms->app_phone??"";
            $this->app_wa = $cms->app_wa??'';
            $this->app_gmaps = $cms->app_gmaps??'';


            $this->favico = $cms->favicon??'';
            $extend  = json_decode($cms?->extend,true);
            if($extend){
                $this->facebook = $extend['facebook']??'';
                $this->youtube = $extend['youtube']??'';
                $this->instagram = $extend['instagram']??'';
                $this->twitter = $extend['twitter']??'';
                $this->linkedin = $extend['linkedin']??'';
            }
        }
    }

    public function submit()
    {


        $this->validate();

        $cms = $this->renderRefresh();
        if ($cms->logo == $this->logo) {
            $logoName = $cms->logo;
        } else {
            $logoName = saveImageLocal($this->logo, 'Logo');
        }
        $icos = $this->renderRefresh();
        if (is_string($icos)) {
            $ico = $cms->favico;
        } else {
            $ico = saveImageLocalNew($this->favico, 'Logo');
        }
        $user = Auth::user();
        $cms  =  ModelsCmsApp::find($user->default_cms);
        $social = [
            'facebook' => $this->facebook,
            'youtube' => $this->youtube,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
        ]; 
        // dd($social);
        $cms->update([
            'app_name'  => $this->app_name,
            'app_url'   => $this->app_url,
            'logo'      => $logoName,
            'app_address' => $this->app_address,
            'app_mail' => $this->app_mail,
            'app_phone' => $this->app_phone,
            'app_wa' => $this->app_wa,
            'app_gmaps' => $this->app_gmaps,
            'favicon'    => $ico,
            'extend'    => json_encode($social)
        ]);
        $this->renderRefresh();
        $this->dispatch('sweet-alert',icon:'success',title:'CMS Updated');
        $this->dispatch('reloadSidebar');
    }

    public function render()
    {
        $user = Auth::user();
        $cms  =  ModelsCmsApp::find($user->default_cms);
        return view('livewire.pages.cms-app',['cms'=>$cms]);
    }

    public function renderRefresh(){
        return ModelsCmsApp::find(auth()->user()->default_cms);
    }
}
