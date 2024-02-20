<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class VisiMisi extends Component
{
    #[Title('Visi-Misi')]
    public function render()
    {
        return view('livewire.pages.visi-misi');
    }
}
