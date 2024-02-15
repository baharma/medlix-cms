<?php

namespace App\Livewire\Pages;

use App\Models\AllSection;
use App\Models\AppSection;
use App\Models\CmsApp;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('APP Section')] 


class Section extends Component
{
    public function confirmDelete($id)
    {
        $section = AppSection::find($id);
        if(!$section){
            $this->dispatch('sweet-alert',icon:'error',title:'Delete Failed');
        }
        $section->delete();
        
        $this->dispatch('reloadSidebar');
        $this->dispatch('sweet-alert',icon:'success',title:'Section Deleted');
        
    }
    #[Validate('required')] 
    public $newsection = '';

    public function save(){
        $section = AppSection::where(['section_id'=>$this->newsection,'app_id'=>auth()->user()->default_cms])->first();
        if($section){
             $this->dispatch('sweet-alert',icon:'error',title:'Section Alredy On APP');
        }else{
            AppSection::create(['section_id'=>$this->newsection,'app_id'=>auth()->user()->default_cms]);
            $this->dispatch('sweet-alert',icon:'success',title:'New Section Added');
            $this->dispatch('reloadSidebar');
        }
       

    }

    
    public function render()
    {
        $data['title'] = 'APP Section';
        $data['section']  = AppSection::with('section')->where('app_id',auth()->user()->default_cms)->get();
        $data['allSection'] = AllSection::all();
        $data['app'] = CmsApp::find(auth()->user()->default_cms);
        return view('livewire.pages.section',$data);
    }
}
