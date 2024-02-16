<?php

namespace App\Livewire\Pages;

use App\Models\AppHero;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Title('Hero Page')]

class Heroes extends Component
{
    use WithFileUploads;

    public $image,$titl,$subTitle,$model;
    public $extend  = [];
    public function mount(){
        $this->model = AppHero::where('app_id',auth()->user()->default_cms)->get();
    }
    public function addItem()
    {
        $this->extend[] = '';
    }
    
    public function removeItem($index)
    {
        unset($this->extend[$index]);
    }
    public function render()
    {
        return view('livewire.pages.heroes');
    }
}
