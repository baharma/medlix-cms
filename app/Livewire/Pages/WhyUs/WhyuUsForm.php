<?php

namespace App\Livewire\Pages\WhyUs;

use App\Models\Media;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class WhyuUsForm extends Component
{
    use WithFileUploads;
    public $image, $title,$idMedia,$model;
    public function render()
    {
        return view('livewire.pages.why-us.whyu-us-form');
    }

    protected function rules(){
        return [
            'title' => 'required|min:6',
            'image' => 'required',
        ];
    }

    public function mount(Media $media){
        $this->model = $media;
    }

    public function save(){
        $this->validate();
        if(is_string($this->image)){
            $image = $this->image;
        }else{
            $image = saveImageLocal($this->image , "Media/WhyUs");
        }
        $data = [
            'title'=>"medlinx",
            'images'=>$image,
            'text'=>$this->title,
            'mark'=>"why_us"
        ];

        if($this->idMedia){
            $this->model->find($this->idMedia)->update($data);
            $this->dispatch('sweet-alert',icon:'success',title:'Your Plan Is Update !');
        }else{
            $this->model->create($data);
            $this->dispatch('sweet-alert',icon:'success',title:'Your About Is Create!');
        }

        $this->clearMedia();
        $this->dispatch('closeModal');
        $this->dispatch('refresh');
    }

    public function clearMedia(){
        $this->fill([
            'title'=>'',
            'idMedia'=>'',
            'image'=>''
        ]);
    }

    #[On('showEdit')]
    public function showEdit($id){
        $this->idMedia = $id;
        $data = $this->model->find($this->idMedia);
        $this->fill([
            'title'=>$data->text,
            'image'=>$data->images
        ]);
        $this->dispatch("showImage",$data->images);
    }
}
