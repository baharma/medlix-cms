<?php

namespace App\Livewire\Pages;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SliderInput extends Component
{
    use WithFileUploads;
    #[Title('Image Slider')]
    public $name,$value,$slider,$provider,$image,$mark,$maps,$client,$edit;

    #[On('setEdit')]
    public function mount($id){
        $this->edit = Media::find($id);
        $this->image = $this->edit->images;
    }
    public function save(){
        if(is_string($this->image) && $this->image != null){
            $imageName = $this->image;
        }else{
            $imageName = saveImageLocalNew($this->image, 'slider');
        }
        Media::create([
            'title' => 'izidok',
            'images' => $imageName,
            'mark'  => 'slider'
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'New Slider Saved');
        $this->render();
        return redirect()->route('slider');
    }
    public function render()
    {
        return view('livewire.pages.slider-input');
    }

}
