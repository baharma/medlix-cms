<?php

namespace App\Livewire\Pages;

use App\Models\Media;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Slider extends Component
{
     use WithFileUploads;
    #[Title('Image Slider')] 
    public $name,$value,$slider,$provider,$image,$mark,$maps,$client,$edit;
    public function mount(){
        $this->slider = Media::where('title','izidok')->get();
    }
     public function save(){
        if(is_string($this->image) && $this->image != null){
            $imageName = $this->image;
        }else{
            $imageName = saveImageLocalNew($this->image, 'slider');
        }
        $this->slider->update([
            'title' => 'izidok',
            'images' => $imageName,
            'mark'  => 'slider'
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Image Slider Updated');
        $this->render();
        $this->mount();
        $this->dispatch('closeModal');
    }
     public  function confirmDelete($id){
        $media = Media::find($id);
        $media->delete();
        $this->dispatch('sweet-alert',icon:'success',title:'Deleted Success');
        $this->mount();
        $this->render();

    }

    public function render()
    {
        return view('livewire.pages.slider');
    }
}
