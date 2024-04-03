<?php

namespace App\Livewire\Pages\Plan;

use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class FormPlan extends Component
{
    public $name,$amount,$plan,$planId,$featues,$planFeatues,$best_seller,$dataFeatues=[],$checkDetail,$duration;
    public function render()
    {
        if($this->planId){
            $this->checkDetail = Plan::find($this->planId)->feature()->get();
        }else{
            $this->checkDetail = [];
        }

        return view('livewire.pages.plan.form-plan');
    }

    protected $rules = [
        'name' => 'required|min:6',
        'amount'    => 'required|numeric',
        'duration'  => 'required|numeric|min:1',
        'best_seller'    => 'required|numeric',
    ];

    #[On('updatePlan')]
    public function updatePlan(){
        $this->featues = PlanFeatue::all();
    }

    public function mount(Plan $model,PlanFeatue $planFeatue){
        $this->featues = $planFeatue->all();
        $this->plan = $model;

    }

    public function create(){

         $this->validate();

        if($this->planId){
           $plan =  $this->plan->find($this->planId)->update([
                'name'=>$this->name,
                'duration'=>$this->duration,
                'amount'=>$this->amount,
                'best_seller'=>$this->best_seller??0,
            ]);
            $thisPlant = $this->plan->find($this->planId);
            if ($this->dataFeatues) {
                collect($this->dataFeatues)->each(function ($event) use ($thisPlant) {
                    $featureCheck = $thisPlant->feature()->where('feature_id', $event)->first();
                    if ($featureCheck) {
                        $pivotId = $featureCheck->pivot->id;
                        if ($pivotId) {
                            $dataDelete = PlanDetail::find($pivotId)->delete();
                        }
                    } else {
                        $thisPlant->feature()->sync([$event => ['check' => false]], false);
                    }
                });
            }
            $this->dispatch('sweet-alert',icon:'success',title:'Your Plan Is update!');
        }else{
            $plan =  $this->plan->create([
                'name'=>$this->name,
                'duration'=> $this->duration,
                'amount'=>$this->amount,
                'best_seller'=>$this->best_seller??0,
                'app_id'=>Auth::user()->default_cms,
            ]);
            $planfeature = PlanFeatue::all();
            foreach($planfeature as $data){
                $plan->feature()->sync($data->id,false);
            }

            $datas = collect($this->dataFeatues)->each(function ($event) use ($plan) {
                $result = PlanDetail::where('plan_id',$plan->id)->where('feature_id',$event)->first();
                if ($result) {
                    $result->update([
                        'check' => true
                    ]);
                }
                return $result;
            });

            $this->dispatch('sweet-alert',icon:'success',title:'Your Plan Is Create!');
        }
        $this->clearInput();
        $this->dispatch('showDelete',['event'=>false]);
        $this->dispatch('closeModalPlan');
        $this->dispatch('dataUpdatePlan');
        $this->resetValidation();
    }
    #[On('EditPlanToEdit')]
    public function EditPlanToEdit($id){
      $data = $this->plan->find($id);
      $this->name = $data->name;
      $this->duration = $data->duration;
      $this->amount = $data->amount;
      $this->planId = $data->id;
      $this->best_seller = $data->best_seller;
      $this->dispatch('showDelete',['event'=>true]);
      $this->dispatch('showAlldata',['event'=>false]);
      $this->dispatch('dataUpdate',['event'=>true]);
      $this->render();
    }

    public function deletePlan(){
        $data =  $this->plan->find($this->planId);
        $data->delete();
        $this->dispatch('sweet-alert',icon:'success',title:'Your Plan Is Deleted!');
        $this->dispatch('dataUpdatePlan');
        $this->dispatch('closeModalPlan');
        $this->clearInput();
    }
    #[On('resetEdit')]
    public function resetEdit(){
        $this->clearInput();
        $this->dispatch('showDelete',['event'=>false]);
        $this->dispatch('showAlldata',['event'=>true]);
        $this->dispatch('showAlldata',['event'=>true]);
        $this->dispatch('dataUpdate',['event'=>false]);
        $this->dispatch('dataCreate',['event'=>true]);
    }
    public function clearInput(){
        $this->name = '';
        $this->duration = '';
        $this->amount = '';
        $this->planId = '';
        $this->best_seller = '';
        $this->dataFeatues = [];
        $this->checkDetail = [];
    }
    public function AddFeatuesPlan(){
        PlanFeatue::create([
            'name'=>$this->planFeatues
        ]);
        $this->planFeatues = '';
        $this->featues = PlanFeatue::all();
        $this->dispatch('sweet-alert', icon: 'success', title: 'Plan Featues Create');
    }

    public function getDataCheckbox($id, $isChecked)
    {
        if ($this->planId) {
            if (!in_array($id, $this->dataFeatues) ) {
                $this->dataFeatues[] = $id;
            } elseif (in_array($id, $this->dataFeatues)) {
                $key = array_search($id, $this->dataFeatues);
                if ($key !== false) {
                    unset($this->dataFeatues[$key]);
                }
            }
        } else {
            if (!in_array($id, $this->dataFeatues) || in_array($id, $this->dataFeatues)) {
                $key = array_search($id, $this->dataFeatues);
                if ($key !== false) {
                    unset($this->dataFeatues[$key]);
                } else {
                    $this->dataFeatues[] = $id;
                }
            }
        }
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
        $this->dispatch('refreshFeature');
    }
}
