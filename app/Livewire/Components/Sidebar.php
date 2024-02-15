<?php

namespace App\Livewire\Components;

use App\Models\AppSection;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    public $section;

    public function mount(){
        $this->section =  AppSection::with('section')->where('app_id',auth()->user()->default_cms)->get();
    }
    public function render()
    {
        return view('livewire.components.sidebar');
    }

    #[On('reloadSidebar')]
    public function reloadSidebar()
    {
        $this->render();
    }
}
