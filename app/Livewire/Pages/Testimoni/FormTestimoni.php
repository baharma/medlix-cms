<?php

namespace App\Livewire\Pages\Testimoni;

use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormTestimoni extends Component
{
    use WithFileUploads;
    #[Title('Form Testimoni')]
    public $model,$idTestimoni;
    public $image,$testimoni,$person,$title;
    protected $rules = [
        'testimoni' => 'required|min:5',
        'person'=> 'required',
        'image'=> 'required'
    ];

    public function mount(Testimoni $testimoni){
        $this->model = $testimoni;
        if($this->idTestimoni){
            $dataModel = $this->model->find($this->idTestimoni);
            $this->fill([
                'image'=>$dataModel->testi_by_img,
                'testimoni'=>$dataModel->testi,
                'person'=>$dataModel->testi_by,
                'title'=>$dataModel->testi_by_title
            ]);
        }
    }
    public function save(){
        $this->validate();
        if(is_string($this->image)){
            $image = $this->image ?? null;
        }else{
            $image = saveImageLocal($this->image,'Testimoni');
        }
        $data = [
            'app_id'=> Auth::user()->default_cms,
            'testi'=>$this->testimoni,
            'testi_by'=>$this->person,
            'testi_by_title'=>$this->title ?? null,
            'testi_by_img'=>$image
        ];
        if($this->idTestimoni){

            $this->model->find($this->idTestimoni)->update($data);
        }else{
            $this->model->create($data);
        }

        $this->dispatch('sweet-alert',icon:'success',title:'New Testimony Added');
        if(1 == Auth::user()->default_cms){
            $route = "medlinx-testimoni";
        }else{
            $route = "izidok-testimoni";
        }
        return to_route($route);
    }
    public function render()
    {
        return view('livewire.pages.testimoni.form-testimoni');
    }
}
