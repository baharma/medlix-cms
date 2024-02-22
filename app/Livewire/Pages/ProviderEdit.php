<?php

namespace App\Livewire\Pages;

use App\Models\Media;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProviderEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Provider')] 
    public $name,$value,$faskes,$provider,$image,$mark,$maps,$client;
    public function mount($id){
        $media = Media::find($id);
        $this->provider = $media;
        $this->image = $media->images;
        $this->mark = $media->title;
    }
    public function save(){
        $provider = $this->provider;
        $image  = $this->image;

        if(is_string($this->image) && $this->image != null){
            $imageName = $image;
        }else{
            $imageName = saveImageLocalNew($this->image, 'slider/');
        }
        $provider->update([
            'title' => $this->mark,
            'images' => $imageName,
            'mark'  => 'slider'
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'New Data Saved');
        return redirect()->to('provider');

    }
    public function render()
    {
        return view('livewire.pages.provider-edit');
    }
}
