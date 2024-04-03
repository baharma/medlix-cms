<?php

namespace App\Livewire\Pages;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Porto extends Component
{
    use WithFileUploads;

    #[Title('Portofolio')]
    public $type,$slider1,$slider2,$mitra,$diliput,$award,$editId,$text,$icon,$logo;
    public function mount(){
        $this->slider1 = Media::where('mark','porto1')->get();
        $this->slider2 = Media::where('mark','porto2')->get();
        $this->award = Media::where('mark','penghargaan')->get();
        $this->mitra = Media::where('mark','mitra')->get();
        $this->diliput = Media::where('mark','diliput')->get();
    }
     public  function confirmDelete($id){
        $media = Media::find($id);
        $media->delete();
        $this->dispatch('sweet-alert',icon:'success',title:'Deleted Success');
        $this->mount();
        $this->render();

    }
    public function editAward($id){
        $this->editId = $id;
        $cms = Media::find($id);
        $this->text = $cms->text;
        $this->icon = ($cms->title);
        $this->logo = ($cms->images);
        $this->dispatch('editId',$id);
        $this->dispatch('showEdit');
    }
    public function render()
    {
        return view('livewire.pages.porto');
    }
    public function save(){
        $media = Media::find($this->editId);
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
        $media->update([
            'text' => $this->text,
            'title' => $iconName,
            'images' => $logoName,
            'mark'  => 'penghargaan'
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Image Slider Updated');
        $this->dispatch('refresh');
        $this->dispatch('closeModal');
    }
    public function setType($type){
        $this->type = $type;
        $this->dispatch('setType',$type);
        $this->dispatch('clearporto');
    }

    #[On('refresh')]
    public function refresh(){
        $this->mount();
        $this->render();
    }


    public function clearPorto(){
        $this->dispatch('clearporto');
        $this->dispatch('clearValidate');
    }



    public function clearPenghargaan(){
        $this->dispatch('clearPenghargaan');

        $this->dispatch('clearInputValidate');
    }
}
