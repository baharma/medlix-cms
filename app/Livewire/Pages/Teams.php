<?php

namespace App\Livewire\Pages;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Teams extends Component
{   
    use WithFileUploads;
    #[Title('Teams')]
    public $model,$image,$name,$title,$upLv,$team,$only,$edit;
    public function mount(){
        if(auth()->user()->default_cms==3){
            $this->model = Team::where('up_lv',1)->get();
            $this->team = Team::where('up_lv',0)->get();
            $this->only = 3;
        }else{
            $this->model = Team::where('up_lv',null)->get();
            $this->team = Team::where('app_id',null)->get();
            $this->only = false;
        }
    }

    public function save(){
       
            $image  = $this->image;
            $name  = $this->name;
            $title  = $this->title;
            if ($title != null) {
                $up_lv = 1;
            }else{
                $up_lv = 0;
            }
            if(is_string($this->image) && $this->image != null){
                $imageName = $image;
            }else{
                $name = Str::slug($name);
                $imageName = saveImageLocalNew($this->image, 'teams/',$name);
            }

            Team::create([
                'app_id'=> $this->only=='null'?null:$this->only,
                'image' => $imageName,
                'name'  => $this->name,
                'title' => $title,
                'up_lv' => $up_lv
            ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Team Saved');
        $this->dispatch('closeModal');
        $this->render();
        $this->reset();
        $this->mount();
    }
    public function confirmDelete($get_id)
    {
         DB::beginTransaction();
         $team = Team::find($get_id);
        
         try {
            if($team){
                $team->delete();
                DB::commit();
                
                $this->dispatch('sweet-alert', icon: 'success', title: 'Team Deleted');
                $this->mount();
                $this->render();
             } else {
                $this->dispatch('sweet-alert', icon: 'error', title: 'Team not found');
             }
         } catch (\Exception $e) {
             DB::rollBack();
             $this->dispatch('sweet-alert', icon: 'error', title: 'An error occurred during deletion, ' . $e->getMessage() );
         }
    }
    
    public function render()
    {
        return view('livewire.pages.teams');
    }
}
