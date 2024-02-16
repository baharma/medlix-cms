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
    // public $app_title;
    // public $app_sub_title;
    // public $app_hero_img;
    public $app_address;
    public $app_mail;
    public $app_phone;
    public $app_wa;
    public $app_gmaps;

    protected $rules = [
        'app_name' => 'required|min:6',
        'app_url' => 'required|url',
        // 'logo' => 'image|max:1024',
        // 'app_title' => 'required',
        // 'app_sub_title' => 'required',
        // 'app_hero_img' => 'image|max:5024',
        // 'app_address' => 'required',
        // 'app_mail' => 'required|mail',
        // 'app_mail' => 'required|email',
        // 'app_phone' => 'required',
        // 'app_wa' => 'required',
        // 'app_gmaps' => 'required',
    ];
    public function mount()
    {

        $cms = $this->renderRefresh();
        // Set the properties from $cms
        if ($cms) {
            $this->app_name = $cms->app_name??'';
            $this->app_url = $cms->app_url??'';
            $this->logo = $cms->logo??"";
            // $this->app_title = $cms->app_title??"";
            // $this->app_sub_title = $cms->app_sub_title??'';
            // $this->app_hero_img = $cms->app_hero_img??"";
            $this->app_address = $cms->app_address??"";
            $this->app_mail = $cms->app_mail??'';
            $this->app_phone = $cms->app_phone??"";
            $this->app_wa = $cms->app_wa??'';
            $this->app_gmaps = $cms->app_gmaps??'';
        }
    }

    public function submit()
    {

        $this->validate();

        $cms = $this->renderRefresh();
        // if ($cms->app_hero_img == $this->app_hero_img) {
        //     $heroimg = $cms->app_hero_img;
        // } else {
        //     $heroimg = saveImageLocal($this->app_hero_img, 'Hero');
        // }
        if ($cms->logo == $this->logo) {
            $logoName = $cms->logo;
        } else {
            $logoName = saveImageLocal($this->logo, 'Logo');
        }
        $user = Auth::user();
        $cms  =  ModelsCmsApp::find($user->default_cms);
        $cms->update([
            'app_name'  => $this->app_name,
            'app_url'   => $this->app_url,
            'logo'      => $logoName,
            // 'app_title' => $this->app_title,
            // 'app_sub_title' => $this->app_sub_title,
            // 'app_hero_img' => $heroimg,
            'app_address' => $this->app_address,
            'app_mail' => $this->app_mail,
            'app_phone' => $this->app_phone,
            'app_wa' => $this->app_wa,
            'app_gmaps' => $this->app_gmaps,
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
