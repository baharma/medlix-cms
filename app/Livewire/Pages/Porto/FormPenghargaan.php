<?php

namespace App\Livewire\Pages\Porto;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormPenghargaan extends Component
{
    use WithFileUploads;
    public $icon,$logo,$text,$editId;
    protected $rules = [
        'icon' => 'required',
        'logo'=> 'required',
        'text'=> 'required'
    ];
    public function save(){
        $this->validate();
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
        if($this->editId){
            Media::find($this->editId)
            ->update([
                'text' => $this->text,
                'title' => $iconName,
                'images' => $logoName,
                'mark'  => 'penghargaan'
            ]);
        }else{
            Media::create([
                'text' => $this->text,
                'title' => $iconName,
                'images' => $logoName,
                'mark'  => 'penghargaan'
            ]);
        }

        $this->dispatch('sweet-alert',icon:'success',title:'Image Slider Updated');
        $this->dispatch('refresh');
        $this->dispatch('closeModal');
    }
    #[On('editId')]
    public function editId($id){
        $cms = Media::find($id);
        $this->editId = $id;
        $this->text = $cms->text;
        $this->icon = asset($cms->title);
        $this->logo = asset($cms->images);
        $this->dispatch('showImage',true);
    }
    public function render()
    {
        return view('livewire.pages.porto.form-penghargaan');
    }

    #[On('clearPenghargaan')]
    public function clearPenghargaan(){
        $this->fill([
            'icon' =>null,
            'logo'=> null,
            'text'=>null
        ]);
        $this->dispatch('clearimage');
    }

    #[On('clearInputValidate')]
    public function clearInputValidate(){
        $this->resetErrorBag('icon');
        $this->resetErrorBag('logo');
        $this->resetErrorBag('text');
    }
}
