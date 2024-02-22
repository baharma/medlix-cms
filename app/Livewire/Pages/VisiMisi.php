<?php

namespace App\Livewire\Pages;

use App\Models\VisiMisi as ModelsVisiMisi;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class VisiMisi extends Component
{
    #[Title('Visi-Misi')]

    public $model, $dataEdit;


    public function mount(ModelsVisiMisi $visiMisi){
        $this->model = $visiMisi;
        if($this->model->where('app_id',1)->get()){
            $this->dataEdit = $this->model->where('app_id',1)->first();
        }
    }

    public function render()
    {
        $dataVisi = $this->model->where('app_id',1)->get();
        return view('livewire.pages.visi-misi',compact('dataVisi'));
    }

    public function confirmDelete($id){
        $visi = $this->model->find($id);
        Storage::disk('images_local')->delete($visi->visi_img);
        Storage::disk('images_local')->delete($visi->misi_img);
        Storage::disk('images_local')->delete($visi->detail_img);
        $visi->delete();
        $this->dispatch('sweet-alert',icon:'success',title:'Visi-Misi Deleted');
    }


}
