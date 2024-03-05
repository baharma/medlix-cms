<?php

namespace App\Livewire\Pages\WhyUs;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class WhyUs extends Component
{
    #[Title('Why Us')]

    public $model;
    public $image, $title;
    public function mount(){
        $this->model = Media::where('title','medlinx')->get();
    }
    public function confirmDelete($get_id)
    {
        $this->model->find($get_id)->delete();
    }
    public function render()
    {
        return view('livewire.pages.why-us.why-us');
        $this->dispatch('sweet-alert', icon: 'success', title: 'Delete Succes');
    }
    public function Edit($id){
        $this->dispatch('showEdit',$id);
    }

    #[On('refresh')]
    public function refresh(){
        $this->model = Media::where('title','medlinx')->get();
    }

}


