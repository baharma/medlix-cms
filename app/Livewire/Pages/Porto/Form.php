<?php

namespace App\Livewire\Pages\Porto;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $image,$type;
    public function save(){
        if(is_string($this->image) && $this->image != null){
            $imageName = $this->image;
        }else{
            $imageName = saveImageLocalNew($this->image, 'slider');
        }
        Media::create([
            'title'=>'porto',
            'images'=> $imageName,
            'mark'  => $this->type
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Image Slider Updated');
        $this->dispatch('refresh');
        $this->dispatch('closeModal');
    }
    public function render()
    {
        return view('livewire.pages.porto.form');
    }
}
