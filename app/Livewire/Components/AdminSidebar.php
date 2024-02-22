<?php

namespace App\Livewire\Components;

use App\Models\AppSection;
use Livewire\Attributes\On;
use Livewire\Component;

class AdminSidebar extends Component
{
    public $section,$medlinx,$izidok,$iziklaim;

    public function mount(){
        $this->medlinx = AppSection::with('section')->where('app_id',1)->get();
        $this->izidok = AppSection::with('section')->where('app_id',2)->get();
        $this->iziklaim = AppSection::with('section')->where('app_id',3)->get();
    }

    #[On('reloadSidebar')]
    public function reloadSidebar()
    {
        $this->mount();
        $this->render();
    }

    public function save(){

    }

    public function render()
    {
        return view('livewire.components.admin-sidebar');
    }
}
