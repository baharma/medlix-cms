<?php

namespace App\Livewire\Pages;

use App\Models\Plan as ModelsPlan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;

class Plan extends Component
{
    #[Title('Pricing')]

    public $plan , $myplan;
    protected $listeners = ['planId'];
    public function render()
    {
        return view('livewire.pages.plan');
    }
    #[On('refreshPlan')]
    public function refreshPlan(){
        return $this->plan->where('app_id',Auth::user()->default_cms)->get();
        $this->dispatch('reloadPage');

    }

    public function mount(ModelsPlan $Plan){
        $this->plan = $Plan;
        $this->myplan = $this->refreshPlan();

    }

    public function confirmDelete($get_id)
    {
         DB::beginTransaction();
         try {
             $planDetails = PlanDetail::where('plan_id',$get_id)->get();
            
             if ($planDetails->count() >=1) {
                 foreach ($planDetails as $planDetail) {
                     $planDetail->delete();
                 }
                 ModelsPlan::find($get_id)->delete();
                 DB::commit();

                 $this->dispatch('sweet-alert', icon: 'success', title: 'Section Deleted');
                 $this->dispatch('dataUpdateChek');
                $this->dispatch('reloadPage');

             } else {
                $this->dispatch('sweet-alert', icon: 'error', title: 'PlanDetail not found');
             }
         } catch (\Exception $e) {
             DB::rollBack();
             $this->dispatch('sweet-alert', icon: 'error', title: 'An error occurred during deletion, ' . $e->getMessage() );
         }
    }

    public function updateBest($id,$best){
        $data = $this->plan->find($id);
        if($best == true){
            $data->update([
                'best_seller'=>false
            ]);
        }else{
            $data->update([
                'best_seller'=>true
            ]);
        }
        $this->myplan = $this->refreshPlan();
        $this->dispatch('refreshCheckBox',['id'=>$id,'best'=>$best]);
    }

    public function unSwitch($id){
        $planDetail = PlanDetail::find($id);

        if($planDetail->check == true){
            $planDetail->update([
                'check'=>false
            ]);
            $dataCheck = false;
        }else{
            $planDetail->update([
                'check'=>true
            ]);
            $dataCheck = true;
        }
        $this->dispatch('unSwitch',['id'=>$id,'switch'=>$dataCheck]);
    }
    public function planId($id){
        $this->dispatch('dataPlanFeatue',$id);
    }
    #[On('dataFeatuesUpdate')]
    public function dataFeatuesUpdate(){
        $this->refreshPlan();
    }

    #[On('dataUpdatePlan')]
    public function dataUpdatePlan(){
        $this->myplan = $this->refreshPlan();
    }

    public function DataUpdatePlanToedit($id){
        $this->dispatch('EditPlanToEdit',$id);
    }

    public function resets(){
        $this->dispatch('resetEdit');
    }
    #[On('refreshFeature')]
    public function refreshFeature(){
        $this->render();
    }
}
