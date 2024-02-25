<?php

namespace App\Livewire\Admin;


use App\Models\AllSection;
use App\Models\AppSection;
use App\Models\CmsApp;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Title;
use Livewire\Component;

class Section extends Component
{
    #[Title('Section Page')]

    public $section,$allSection,$appSection,$medlinx,$izidok,$iziklaim,$name,$url,$icon,$cms,$edit;
    public $app = [];
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

    public function save(){
        if($this->edit){
            $this->edit->update([
                'name'  => $this->name,
                'url'  => $this->url,
                'icon'  => $this->icon,
                'group'  => $this->cms == '0' ?  null : $this->cms
            ]);
        }else{
            AllSection::create([
                'name'  => $this->name,
                'url'  => $this->url,
                'icon'  => $this->icon,
                'group'  => $this->cms == '0' ?  null : $this->cms
            ]);
        }
        $this->dispatch('sweet-alert',icon:'success',title:'Success Add Section');
        $this->dispatch('closeModal');
        $this->reset();
        $this->mount();
        $this->render();
        
    }
    public function store(){
        AppSection::where('app_id',$this->cms)->delete();
        foreach ($this->app as $val) {
            AppSection::create([
                'app_id'    => $this->cms,
                'section_id'  => $val
            ]);
        }
        $this->dispatch('sweet-alert',icon:'success',title:'Success Add CMS Section');
        $this->dispatch('closeModal');
        $this->dispatch('reloadSidebar');
        $this->reset();
        $this->mount();
        $this->render();
    }
    public function mount(){
        $this->section = AllSection::where('group',100)->get();
        $this->medlinx = AppSection::with('section')->where('app_id',1)->get();
        $this->izidok = AppSection::with('section')->where('app_id',2)->get();
        $this->iziklaim = AppSection::with('section')->where('app_id',3)->get();

    }
    public function setSection(){
        $this->section = AllSection::where('group',null)->orWhere('group',$this->cms)->get();
    }
    public function setEdit($id){
        $section = AllSection::find($id);
        $this->edit = $section;
        $this->name =  $section->name;
        $this->url =  $section->url;
        $this->icon =  $section->icon;
        $this->cms = $section->group == null?'0':$section->group;
    }

    public function render()
    {
        return view('livewire.admin.section');
    }
}
