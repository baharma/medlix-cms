<?php

namespace App\Livewire\Pages\Hero;

use App\Models\AppHero;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Hero Page')]

class Iziklaim extends Component
{
    use WithFileUploads;

    public $image,$title,$model,$subimage;
    public $extend  = [];
    protected $rules = [
        'image'=>'required',
        'title'=>'required',
        'subimage'=>'required'
    ];
    public function mount(){
        $this->model = AppHero::where('app_id',3)->first();
        $this->image = $this->model?->image??'';
        $this->title = $this->model?->title??'';

        $extend = json_decode($this->model?->extend,true);
        $this->subimage = $extend['sub_image']??'';

    }
    public function save(){
        $this->validate();
        $cms = $this->renderRefresh();
        if (is_string($this->image)) {
            $imageName = $cms->image;
        } else {
            $imageName = saveImageLocalnew($this->image, 'hero','iziklaim-hero-img');
        }
        $extend = json_decode($cms?->extend,true);
        if (is_string($this->subimage)) {
            $subImageName = $extend['sub_image'];
        }else{
            $subImageName = saveImageLocalnew($this->subimage, 'hero','iziklaim-sub-hero-img');
        }
        AppHero::updateOrCreate(['app_id' => 3],[
            'app_id' => 3,
            'image'  => $imageName,
            'title'  => $this->title,
            'subtitle' => null,
            'extend' => json_encode(['sub_image'=>$subImageName])
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Heros Page Saved');
        $this->dispatch('modalClosed');
        $this->mount();

    }
    public function clear(){
        $this->mount();
    }

    public function removeItem($index)
    {
        unset($this->extend[$index]);
    }
    public function renderRefresh(){
        return AppHero::where('app_id',3)->first();
    }
    public function render()
    {
        return view('livewire.pages.hero.iziklaim');
    }
}
