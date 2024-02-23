<?php

namespace App\Livewire\Pages\Testimoni;

use App\Models\Testimoni as ModelsTestimoni;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Testimoni extends Component
{
    #[Title('Testimoni')]

    public $model;

    public function mount(ModelsTestimoni $testimoni){
        $this->model = $testimoni;
    }

    public function render()
    {
        $data = $this->model->where('app_id',Auth::user()->default_cms)->get();
        return view('livewire.pages.testimoni.testimoni',compact('data'));
    }


}
