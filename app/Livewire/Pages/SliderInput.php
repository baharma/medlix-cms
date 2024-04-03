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
    public $name,$value,$slider,$provider,$image,$mark,$maps,$client,$edit,$id;


    public function mount(){
        $this->edit = Media::find($this->id);
        $this->image = $this->edit->images;
    }
    public function save(){

        if(is_file($this->image)){
            $imageName = saveImageLocalNew($this->image, 'slider');
        }else{
            $imageName = $this->edit->images;
        }

        $this->edit->update([
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
