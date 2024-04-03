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
    protected $rules = [
        'image' => 'required',
        'type'=> 'required',
    ];

    #[On('clearporto')]
    public function clearporto(){
        $this->fill([
            'image'=>null,
            'type'=>null
        ]);
    }
    public function save(){
        $this->validate();
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
        $this->reset();
        $this->dispatch('refresh');
        $this->dispatch('closeModal');
    }
    public function render()
    {
        return view('livewire.pages.porto.form');
    }
    #[On('clearValidate')]
    public function clearValidate(){
        $this->resetErrorBag('image');
        $this->resetErrorBag('type');
    }
}
