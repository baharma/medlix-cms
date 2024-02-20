<?php

namespace App\Livewire\Pages;

use App\Models\VisiMisi as ModelsVisiMisi;
use Livewire\Attributes\Title;
use Livewire\Component;

class VisiMisi extends Component
{
    #[Title('Visi-Misi')]

    public $model;


    public function mount(ModelsVisiMisi $visiMisi){
        $this->model = $visiMisi;
    }

    public function render()
    {
        $dataVisi = $this->model->all();
        return view('livewire.pages.visi-misi',compact('dataVisi'));
    }


}
