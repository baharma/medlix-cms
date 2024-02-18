<?php

namespace App\Livewire\Pages\News;

use Livewire\Attributes\Title;
use Livewire\Component;

class FormNews extends Component
{
    #[Title('News Form')]
    public $artikelId;
    public $title, $thumnail, $discription;

    public function render()
    {
        return view('livewire.pages.news.form-news');
    }


    public function save(){

    }
}
