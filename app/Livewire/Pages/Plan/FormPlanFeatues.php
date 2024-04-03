<?php

namespace App\Livewire\Pages\Plan;

use App\Models\Plan;
use App\Models\PlanFeatue;
use Livewire\Component;
use Livewire\Attributes\On;

class FormPlanFeatues extends Component
{
    public $feature,$modal,$planFeatues,$id;

    protected $rules = [
        'planFeatues'=>'required|min:6'
    ];

    public function render()
    {
        $this->feature = PlanFeatue::all();
        return view('livewire.pages.plan.form-plan-featues');
    }

    public function mount(PlanFeatue $planFeatue){
        $this->modal = $planFeatue;
    }

    public function Edit($id){
        $planFeatues =  $this->modal->find($id);
        $this->planFeatues = $planFeatues->name;
        $this->id = $planFeatues->id;
        $this->dispatch('showInput',['event'=>true]);
    }

    public function create(){
        $this->validate();
        if($this->id){
            $dataPlan = $this->modal->find($this->id);
            $dataPlan->update([
                'name'=>$this->planFeatues
            ]);
            $this->dispatch('updatePlan');
        }else{
            $data =  $this->modal->create([
                'name'=>$this->planFeatues
            ]);
            $plan = Plan::all();
            foreach($plan as $item){
                $item->feature()->sync($data->id,false);
            }
            $this->dispatch('updatePlan');
        }
        $this->clearInput();
        $this->dispatch('showInput',['event'=>false]);
        $this->resetValidation();

    }

    public function clearInput(){
        $this->planFeatues = '';
        $this->id = '';
    }

}
