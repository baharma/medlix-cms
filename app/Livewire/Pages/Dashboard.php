<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]

class Dashboard extends Component
{

    public function mount(){
        if (session()->has('publish')) {
            $data = session('publish');
            $this->dispatch('alertSuccess', $data[0]['message']);
            session()->forget('publish');
        }
    }
    public function render()
    {
        return view('livewire.pages.dashboard');
    }
}
