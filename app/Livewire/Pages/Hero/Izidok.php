<?php

namespace App\Livewire\Pages\Hero;

use App\Models\AppHero;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
#[Title('Hero Page')]

class Izidok extends Component
{
     use WithFileUploads;

    public $image,$title,$subTitle,$model;
    public $extend  = [];

    public function mount(){
        $this->model = AppHero::where('app_id',2)->first();
        $this->image = $this->model?->image??'';
        $this->title = $this->model?->title??'';
        $this->subTitle = $this->model?->subtitle??'';
        $extend = json_decode($this->model?->extend,true);
   
        if($extend !== null && $extend[0] !=""){
            $data = $extend;
        }else{
            $data[] = ['key'=>'youtube_url','val'=>''];
        }
        $this->fill([
            'extend' => collect($data),
        ]);
   
    }
    protected $rules = [
        'extend.*.key' => 'min:6',
        'extend.*.val' => 'min:6'
    ];
    public function addItem()
    {
        $this->extend[] = '';
    }
    public function save(){
     
        $extend = json_encode($this->extend);
        $cms = $this->renderRefresh();
        if ($cms?->image == $this->image) {
            $imageName = $cms->image;
        } else {
            $imageName = saveImageLocalNew($this->image, 'hero','izidok-hero-img');
        }
        AppHero::updateOrCreate(['app_id' => 2],[
            'app_id' => 2,
            'image'  => $imageName,
            'title'  => $this->title,
            'subtitle' => $this->subTitle,
            'extend' => $extend
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Heros Page Saved');
        $this->dispatch('modalClosed');
        $this->mount();

    }
    
    
    public function removeItem($index)
    {
        unset($this->extend[$index]);
    }
    public function renderRefresh(){
        return AppHero::where('app_id',2)->first();
    }

    public function render()
    {
        return view('livewire.pages.hero.izidok');
    }
}
