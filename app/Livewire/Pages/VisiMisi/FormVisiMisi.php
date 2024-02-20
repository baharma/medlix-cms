<?php

namespace App\Livewire\Pages\VisiMisi;

use App\Models\VisiMisi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormVisiMisi extends Component
{
    use WithFileUploads;
    #[Title('Form Visi-Misi')]
    public $visi,$misi,$imageVisi,$imageMisi,$image;
    public $model,$idVisiMisi;

    public function mount(VisiMisi $visiMisi){
        $this->model = $visiMisi;
    }

    public function render()
    {
        return view('livewire.pages.visi-misi.form-visi-misi');
    }

    public function save(){
        $visiImage = $this->imageVisi ? saveImageLocal($this->imageVisi, 'VisiMisi/Visi') : null;
        $misiImage = $this->imageMisi ? saveImageLocal($this->imageMisi, 'VisiMisi/Misi') : null;
        $image = $this->image ? saveImageLocal($this->image, 'VisiMisi/Detail') : null;
        $visi = $this->visi;
        $misi = $this->misi;
        $property = [
            'app_id'=>Auth::user()->default_cms,
            'visi'=>$visi,
            'misi'=>$misi,
            'visi_img'=>$visiImage,
            'misi_img'=>$misiImage,
            'detail_img'=>$image
        ];

        $this->model->create($property);
        $this->dispatch('sweet-alert',icon:'success',title:'Visi-Misi Saved');
        return to_route('visi-misi');
    }
}
