<?php

namespace App\Livewire\Pages\VisiMisi;

use App\Models\VisiMisi;
use Livewire\Attributes\Title;
use Livewire\Component;

class VisiMisiiziklaim extends Component
{
    #[Title('Visi-Misi')]

    public $model,$idData;

    public function mount(VisiMisi $visiMisi){
        $this->model = $visiMisi;
        $this->idData = $this->model->where('app_id',3)->first();
    }
    public function render()
    {
        $data = $this->model->where('app_id',3)->get();
        return view('livewire.pages.visi-misi.visi-misiiziklaim',compact('data'));
    }
}
