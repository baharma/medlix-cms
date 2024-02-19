<?php

namespace App\Livewire\Pages;

use App\Models\AllSection;
use App\Models\AppSection;
use App\Models\CmsApp;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('APP Section')] 


class Section extends Component
{
    public $section,$allSection,$app,$appSection;
    
    public function confirmDelete($id)
    {
        $section = AppSection::find($id);
        if(!$section){
            $this->dispatch('sweet-alert',icon:'error',title:'Delete Failed');
        }
        $section->delete();
        $this->mount();
        $this->dispatch('reloadSidebar');
        $this->dispatch('sweet-alert',icon:'success',title:'Section Deleted');
        
    }
    public $newsection = '';

    public function save(){
      
        $section = AppSection::where(['section_id'=>$this->newsection,'app_id'=>auth()->user()->default_cms])->first();
        if($section){
             $this->dispatch('sweet-alert',icon:'error',title:'Section Alredy On APP');
        }else{
            AppSection::create(['section_id'=>$this->newsection,'app_id'=>auth()->user()->default_cms]);
            $this->dispatch('sweet-alert',icon:'success',title:'New Section Added');
            $this->mount(); 
            $this->dispatch('reloadSidebar');
        }
    }
    public function mount(){
        $this->section = AppSection::with('section')->where('app_id',auth()->user()->default_cms)->get();
       
        $notIn  = [];
        foreach ($this->section as $key => $value) {
            $notIn[]  = $value->section_id;
        }
        $this->allSection = AllSection::all();
        $this->appSection = AllSection::whereNotIn('id',$notIn)->get();
        
        $this->app = CmsApp::find(auth()->user()->default_cms);

    }
    
    public function render()
    {
        return view('livewire.pages.section');
    }
}
