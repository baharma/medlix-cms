<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Starter')] 

class Starter extends Component
{

    public function render()
    {
        return view('livewire.pages.starter');
    }
}
