<?php

namespace App\Livewire\Pages;

use App\Models\Team;
use Livewire\Attributes\Title;
use Livewire\Component;

class Teams extends Component
{   
    #[Title('Teams')]
    public $model,$image,$name,$title,$upLv;
    public function mount(){
        $this->model = Teams::all();
    }
    
    public function render()
    {
        return view('livewire.pages.teams');
    }
}
