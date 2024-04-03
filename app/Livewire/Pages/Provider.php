<?php

namespace App\Livewire\Pages;

use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Provider extends Component
{
    use WithFileUploads;
    #[Title('Provider')]
    public $name,$value,$faskes,$provider,$image,$mark,$maps,$client,$edit;
    public function mount(){
        $this->faskes = Media::where('mark','provider')->get();
        $this->provider = Media::where(['mark'=>'slider','title'=>'provider'])->get();
        $this->maps = Media::where(['mark'=>'slider','title'=>'maps'])->get();
        $this->client = Media::where(['mark'=>'slider','title'=>'client'])->get();
    }

    public function clearFaskes(){
        $this->fill([
            'name'=>null,
            'value'=>null,
            'mark'=>null,
            'image'=>null
        ]);
        $this->resetErrorBag('name');
        $this->resetErrorBag('value');
        $this->resetErrorBag('mark');
        $this->resetErrorBag('image');
        $this->dispatch('imageClear');
    }

    public function store(){

        $this->validate([
            'name'=>'required',
            'value'=>'required',

        ]);

        $edit = $this->edit;
        $name = $this->name;
        $val = $this->value;
        DB::beginTransaction();
        try {
           if($edit){
            $edit->update([
                'title' => $name,
                'text'  => $val,
                'mark'  => 'provider'
            ]);
           }else{
            Media::create([
                'title' => $name,
                'text'  => $val,
                'mark'  => 'provider'
            ]);
           }
            DB::commit();
            $this->dispatch('sweet-alert',icon:'success',title:'Data Saved');
            $this->dispatch('closeModal');
            $this->mount();
            $this->render();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert',icon:'error',title:'Some Error:' . $th->getMessage() );
        }

    }

    public function save(){
        $name = $this->mark;
        $image  = $this->image;
      $this->validate([
            'mark'=>'required',
            'image'=>'required'
        ]);
        if(is_string($this->image) && $this->image != null){
            $imageName = $image;
        }else{
            $imageName = saveImageLocalNew($this->image, 'slider/');
        }
        DB::beginTransaction();
        try {
            Media::create([
                'title' => $name,
                'images' => $imageName,
                'mark'  => 'slider'
            ]);
            DB::commit();
            $this->dispatch('sweet-alert',icon:'success',title:'Data Saved');
            $this->dispatch('closeModal');
            $this->mount();
            $this->render();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert',icon:'error',title:'Some Error:' . $th->getMessage() );
        }
    }

    public  function confirmDelete($id){
        $media = Media::find($id);
        $media->delete();
        $this->dispatch('sweet-alert',icon:'success',title:'Deleted Success');
        $this->mount();
        $this->render();
    }

    public function editEvent($id){
        $media = Media::find($id);
        $this->edit = $media;
        $this->name = $media->title;
        $this->value  = $media->text;
    }
    public function render()
    {
        return view('livewire.pages.provider');
    }




}
