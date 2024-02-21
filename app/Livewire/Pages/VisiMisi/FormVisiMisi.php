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
    public $model,$idVisiMisi,$visiMisiEdit;

    public function mount(VisiMisi $visiMisi)
    {
        $this->model = $visiMisi;

        if ($this->idVisiMisi) {
            $this->visiMisiEdit = $this->model->find($this->idVisiMisi);
            $this->fill([
                'visi' => $this->visiMisiEdit->visi,
                'misi' => $this->visiMisiEdit->misi,
                'imageVisi' => $this->visiMisiEdit->visi_img,
                'imageMisi' => $this->visiMisiEdit->misi_img,
                'image' => $this->visiMisiEdit->detail_img,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.visi-misi.form-visi-misi');
    }

    public function save(){
        if (is_object($this->imageVisi) && method_exists($this->imageVisi, 'isFile') && $this->imageVisi->isFile()) {
            $visiImage = saveImageLocal($this->imageVisi, 'VisiMisi/Visi');
        } else {
            $visiImage = $this->visiMisiEdit->visi_img ?? null;
        }

        if (is_object($this->imageMisi) && method_exists($this->imageMisi, 'isFile') && $this->imageMisi->isFile()) {
            $misiImage = saveImageLocal($this->imageMisi, 'VisiMisi/Misi');
        } else {
            $misiImage = $this->visiMisiEdit->misi_img ?? null;
        }

        if (is_object($this->image) && method_exists($this->image, 'isFile') && $this->image->isFile()) {
            $image = saveImageLocal($this->image, 'VisiMisi/Detail');
        } else {
            $image = $this->visiMisiEdit->detail_img ?? null;
        }
        $visi = insertIcon($this->visi);
        $misi = insertIcon($this->misi);
        $property = [
            'app_id'=>Auth::user()->default_cms,
            'visi'=>$visi,
            'misi'=>$misi,
            'visi_img'=>$visiImage,
            'misi_img'=>$misiImage,
            'detail_img'=>$image
        ];
        if($this->idVisiMisi){
            $this->visiMisiEdit->update($property);
        }else{
            $this->model->create($property);
        }
        $this->dispatch('sweet-alert',icon:'success',title:'Visi-Misi Saved');
        return to_route('visi-misi');
    }

    public function SureSave(){
        $this->dispatch('saveVisiMisi');
    }
}
