<?php

namespace App\Livewire\Pages\Keunggulan;

use App\Models\Keunggulan as ModelsKeunggulan;
use App\Models\KeunggulanList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class Keunggulan extends Component
{
    use WithFileUploads;

    #[Title('Keunggulan')]

    public $model,$data;
    public $title, $description, $imageTitle,$image;
    public $titleList = [],$imageList = [];


    public function mount(ModelsKeunggulan $keunggulan){
        $this->model = $keunggulan;

        $data = $this->model->where('app_id',Auth::user()->default_cms)->first();
        if($data){
            $this->fill([
                'title'=>$data->title,
                'description'=>$data->description,
                'imageTitle'=>$data->image_title,
                'image'=>$data->image
            ]);
            $listKeunggulan =  $data->KeunggulanList;
            foreach($listKeunggulan as $items){
                $this->titleList[$items->id] = $items->title;
                $this->imageList[$items->id] = $items->image;
            }

        }else{
            $item = [
                'app_id'=>Auth::user()->default_cms
            ];
            $data = $this->model->create($item);
            $this->fill([
                'title'=>$data->title,
                'description'=>$data->description,
                'imageTitle'=>$data->image_title,
                'image'=>$data->image
            ]);
        }
        $this->data = $data;
    }

    public function newlist(){
        $data =  $this->data->KeunggulanList()->create([
            'title'=>'please edit'
        ]);
        $this->dispatch('renderDrofi',$data->id);
        $this->render();
    }

    public function save(){
        if (!$this->data) {
            return;
        }
        $data = collect($this->imageList)->map(function ($temporaryUploadedFile, $index) {
            $imageData = is_string($temporaryUploadedFile) ? $temporaryUploadedFile : saveImageLocal($temporaryUploadedFile, 'KeunggulanList');
            $titleData = isset($this->titleList[$index]) ? $this->titleList[$index] : null;
            return [
                'id' => $index,
                'image' => $imageData,
                'title' => $titleData,
            ];
        });
        collect($data)->map(function($event){
            $keunggulan = KeunggulanList::find($event['id']);
            $keunggulan->update([
                'title'=>$event['title'],
                'image'=>$event['image']
            ]);
        });

        $this->data->update([
            'title'=>$this->title,
            'description'=>$this->description
        ]);

        $this->dispatch('sweet-alert',icon:'success',title:'Keunggulan Update');
        $this->dispatch('showdetail',[
            'detail'=>true,
            'edit'=>false
        ]);
    }

    public function saveKeunggulan(){
        if(is_string($this->image)){
            $image = $this->image;
        }else{
            $image = saveImageLocal($this->image,'Keunggulan');
        }
        $this->data->update([
            'image'=>$image,
            'image_title'=>$this->imageTitle,
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Keunggulan Update');
        $this->dispatch('showdetailKeunggulan',[
            'details'=>true,
            'edits'=>false
        ]);
    }

    public function getdetail(){
        $data = $this->model->where('app_id',Auth::user()->default_cms)->first();
        $this->fill([
            'title'=>$data->title,
            'description'=>$data->description,
            'imageTitle'=>$data->image_title,
            'image'=>$data->image
        ]);
        $listKeunggulan =  $data->KeunggulanList;
        foreach($listKeunggulan as $items){
            $this->titleList[$items->id] = $items->title;
            $this->imageList[$items->id] = $items->image;
        }
    }

    public function deleteThis($id){
        $keunggulan = KeunggulanList::find($id);
        if ($keunggulan) {
            $keunggulan->delete();
            $this->render();
            $this->dispatch('sweet-alert',icon:'success',title:'Keunggulan Update');
            $this->dispatch('reaload');
        } else {
            return response()->json(['message' => 'Record not found.'], 404);
        }
    }
    public function render()
    {
        $this->data = $this->model->with('keunggulanList')->where('app_id', Auth::user()->default_cms)->first();
        return view('livewire.pages.keunggulan.keunggulan');
    }
}

