<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class News extends Component
{
    #[Title('News')]

    public function render()
    {
        return view('livewire.pages.news');
    }

}
