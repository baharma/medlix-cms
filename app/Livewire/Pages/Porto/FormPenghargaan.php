<?php

namespace App\Livewire\Pages\Porto;

use App\Models\Media;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormPenghargaan extends Component
{
    use WithFileUploads;
    public $icon,$logo,$text;
    public function save(){
        if(is_string($this->icon) && $this->icon != null){
            $iconName = $this->icon;
        }else{
            $iconName = saveImageLocalNew($this->icon, 'slider');
        }
        if(is_string($this->logo) && $this->logo != null){
            $logoName = $this->logo;
        }else{
            $logoName = saveImageLocalNew($this->logo, 'slider');
        }
        Media::create([
            'text' => $this->text,
            'title' => $iconName,
            'images' => $logoName,
            'mark'  => 'penghargaan'
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Image Slider Updated');
        $this->dispatch('refresh');
        $this->dispatch('closeModal');
    }
    public function render()
    {
        return view('livewire.pages.porto.form-penghargaan');
    }
}
