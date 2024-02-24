<?php

namespace App\Livewire\Pages\VisiMisi;

use App\Models\VisiMisi;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class FormIziklaimVisiMisi extends Component
{
    #[Title('Visi-Misi')]

    public $idVisiMisi,$visiMisiEdit;
    public $model,$visi,$misi;
    public function mount(VisiMisi $visiMisi){
        $this->model = $visiMisi;
        if ($this->idVisiMisi) {
            $this->visiMisiEdit = $this->model->find($this->idVisiMisi);
            $this->fill([
                'visi' => $this->visiMisiEdit->visi,
                'misi' => $this->visiMisiEdit->misi,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.pages.visi-misi.form-iziklaim-visi-misi');
    }

    public function save(){
        $visi = insertIcon($this->visi);
        $misi = insertIcon($this->misi);
        $property = [
            'app_id' => Auth::user()->default_cms ?? 3,
            'visi' => $visi,
            'misi' => $misi,
        ];
        if($this->idVisiMisi){
            $this->visiMisiEdit->update($property);
        }else{
            $this->model->create($property);
        }
        $this->dispatch('sweet-alert', icon: 'success', title: 'Visi-Misi Saved');
        $this->clear();
        return to_route('visi-misi.iziklaim');
    }
    public function clear(){
        $this->fill([
            'visi' => '',
            'misi' => '',
        ]);
    }

    public function saveNow(){
        $this->dispatch('saveNow');
    }
}
