<?php

namespace App\Livewire\Pages;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Porto extends Component
{
    #[Title('Portofolio')]
    public $type,$slider1,$slider2,$mitra,$diliput,$award;
    public function mount(){
        $this->slider1 = Media::where('mark','porto1')->get();
        $this->slider2 = Media::where('mark','porto2')->get();
        $this->award = Media::where('mark','award')->get();
        $this->mitra = Media::where('mark','mitra')->get();
        $this->diliput = Media::where('mark','diliput')->get();
    }
    public function render()
    {
        return view('livewire.pages.porto');
    }
    public function setType($type){
        $this->type = $type;
        $this->dispatch('setType',$type);

    }
    #[On('refresh')]
    public function refresh(){
        $this->mount();
        $this->render();
    }    
}
