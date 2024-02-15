<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Solution as SolutionModel;
use Illuminate\Support\Facades\DB;

class Solution extends Component
{
    #[Title('Solution')] 
    public $id,$title,$sub_title,$solution,$model,$user;

    protected $rules = [
        'title'         => 'required|min:6',
        'sub_title'     => 'required',
    ];
    public function mount(SolutionModel $model){
        $this->user = auth()->user();
        $this->solution = $model->where('app_id',$this->user->default_cms)->get();
    }
    public function confirmDelete($id)
    {
        $section = SolutionModel::find($id);
        if(!$section){
            $this->dispatch('sweet-alert',icon:'error',title:'Delete Failed');
        }
        $section->delete();
        
        $this->updateSolution();
        $this->render();
        $this->dispatch('sweet-alert',icon:'success',title:'Solution Deleted');
        
    }
    public function updateSolution()
    {
        $this->solution = SolutionModel::where('app_id',auth()->user()->default_cms)->get();
    }
    public function save(){
        $this->validate();
        DB::beginTransaction();
        try {
            SolutionModel::create([
                'app_id'    => auth()->user()->default_cms,
                'title'     => $this->title,
                'sub_title' => $this->sub_title
            ]);
            $this->reset();
            $this->dispatch('sweet-alert',icon:'success',title:'Created Solution Success');
            $this->dispatch('closeModal');
            $this->updateSolution();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
        
    }

    #[On('dataToEdit')]
    public function dataToEdit($id){
      $data = $this->solution->find($id);
      $this->title = $data->title;
      $this->sub_title = $data->sub_title;
      $this->id = $data->id;
    //   $this->dispatch('showDelete',['event'=>true]);
    //   $this->dispatch('showAlldata',['event'=>false]);
    //   $this->dispatch('dataUpdate',['event'=>true]);
      $this->render();
    }

    public function render()
    {
        return view('livewire.pages.solution',);
    }
}
