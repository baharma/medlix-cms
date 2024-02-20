<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class Slider extends Component
{
    #[Title('Slider')] 
    public function mount(){
        
    }

    public function render()
    {
        return view('livewire.pages.slider');
    }
}
