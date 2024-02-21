<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class Porto extends Component
{
    #[Title('Portofolio')]

    public function render()
    {
        return view('livewire.pages.porto');
    }
}
