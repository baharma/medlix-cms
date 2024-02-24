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

    public $visi,$misi;
    public $model,$idVisiMisi,$visiMisiEdit;
    public $imageVisi;
    public $imageMisi;
    public $image;

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

    public function save()
    {
        if (is_string($this->imageVisi)) {
            $visiImage = $this->visiMisiEdit->visi_img ?? null;
        } else {
            $visiImage = saveImageLocal($this->imageVisi, 'VisiMisi/Visi');
        }
        if (is_string($this->imageMisi)) {
            $misiImage = $this->visiMisiEdit->misi_img ?? null;
        } else {
            $misiImage = saveImageLocal($this->imageMisi, 'VisiMisi/Misi');
        }
        if (is_string($this->image)) {
            $image = $this->visiMisiEdit->detail_img ?? null;
        } else {
            $image = saveImageLocal($this->image, 'VisiMisi/Detail');
        }

        $visi = insertIcon($this->visi);
        $misi = insertIcon($this->misi);

        $property = [
            'app_id' => Auth::user()->default_cms ?? 1,
            'visi' => $visi,
            'misi' => $misi,
            'visi_img' => $visiImage,
            'misi_img' => $misiImage,
            'detail_img' => $image
        ];

        if ($this->idVisiMisi) {
            $this->visiMisiEdit->update($property);
        } else {
            $this->model->create($property);
        }
        $this->dispatch('sweet-alert', icon: 'success', title: 'Visi-Misi Saved');
        $this->clear();
        return to_route('visi-misi.medlinx');
    }

    public function SureSave(){
        $this->dispatch('saveVisiMisi');
    }
    public function clear(){
        $this->fill([
            'visi' => '',
            'misi' => '',
            'imageVisi' => '',
            'imageMisi' => '',
            'image' =>'',
        ]);
    }
}
