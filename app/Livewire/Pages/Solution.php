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
    public $id,$title,$sub_title,$solution,$model,$user,$app_id,$solution_id;

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
    #[On('ClearInput')]
    public function ClearInput(){
      $this->reset();
    }

    #[On('dataToEdit')]
    public function dataToEdit($id){
      $data = SolutionModel::find($id);
      $this->title = $data->title;
      $this->sub_title = $data->sub_title;
      $this->solution_id = $data->id;
      $this->app_id = $data->app_id;
      $this->render();
    }

    public function update(){
     
        $solution = SolutionModel::find($this->solution_id);
        if (!$solution) {
            $this->dispatch('sweet-alert',icon:'error',title:'Solution Not Found');
        }
        $solution->update([
            'title'     => $this->title,
            'sub_title' => $this->sub_title
        ]);
        $this->reset();
        $this->dispatch('sweet-alert',icon:'success',title:'Created Solution Success');
        $this->dispatch('closeModalUpdate');
        $this->updateSolution();
    }

    public function render()
    {
        return view('livewire.pages.solution',);
    }
}
