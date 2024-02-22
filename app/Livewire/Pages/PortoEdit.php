<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class PortoEdit extends Component
{
    #[Title('Portofolio')]

    public function render()
    {
        return view('livewire.pages.porto-edit');
    }
}
