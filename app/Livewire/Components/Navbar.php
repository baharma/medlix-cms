<?php

namespace App\Livewire\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $user;

    #[On('reloadNavbar')]
    public function reloadNavbar()
    {
        $this->mount();
        $this->render();
    }
    public function mount(){
        $this->user = User::find(auth()->user()->id);
    }
    public function render()
    {
        return view('livewire.components.navbar');
    }
}
