<?php

namespace App\Livewire\Pages\Keunggulan;

use App\Models\KeunggulanList as ModelsKeunggulanList;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class KeunggulanList extends Component
{
    use WithFileUploads;
    public $id,$title,$image,$idKeunggulan, $modal;

    public function mount(ModelsKeunggulanList $keunggulanList){
        $this->modal = $keunggulanList;
    }

    protected $rules = [
        'title' => 'required',
        'image'=> 'required',
    ];

    public function render()
    {
        return view('livewire.pages.keunggulan.keunggulan-list');
    }

    public function save(){
        $this->validate();

        if(is_string($this->image)){
            $image = $this->image;
        }else{
            $image = saveImageLocal($this->image,'KeunggulanLocal');
        }
        $data = [
            'title'=>$this->title,
            'keunggulan_id'=>$this->idKeunggulan,
            'image'=>$image
        ];
        if($this->id){
            $this->modal->find($this->id)->update($data);
        }else{
            $this->modal->create($data);
        }
        $this->clearToNull();
        $this->dispatch('updateKeunggulan');
        $this->dispatch('closeModal');
    }

    #[On('toClear')]
    public function toClear(){
        $this->clearToNull();
    }

    public function clearToNull(){
        $this->fill([
            'id'=>null,
            'title'=>null,
            'image'=>null
        ]);
        $this->dispatch('clearImage');
        $this->dispatch('clearImagedrofi');
    }

    #[On('editGet')]
    public function editGet($id){
        $data = $this->modal->find($id);
        $this->id = $id;
        $this->fill([
            'id'=>$data->id,
            'title'=>$data->title,
            'image'=>$data->image
        ]);
        $this->dispatch('imageshow');
        $this->dispatch('clearImagedrofi');
    }

    public function clearValidate(){

    }
}
