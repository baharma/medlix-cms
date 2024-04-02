<?php

namespace App\Livewire\Pages\Teams;

use App\Models\Team;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Str;


class MedlinxEdit extends Component
{
    use WithFileUploads;
    #[Title('Edit Teams')]
    public $model,$image,$name,$title,$upLv,$team,$only,$edit,$extend,$twitter,$linkedin,$instagram;
    public function mount($id){
        $cms = Team::find($id);
        $this->edit = $cms;
        $this->image = $cms->image;
        $this->name =  $cms->name;
        $this->title = $cms->title;
        $this->extend = $cms->extend;
        $social = $this->extend;
        if ($social != null) {
                $s = json_decode($social, true);
                $this->twitter = $s['twitter'];
                $this->instagram = $s['instagram'];
                $this->linkedin = $s['linkedin'];
            } else {
                $this->twitter = '#';
                $this->instagram = '#';
                $this->linkedin = '#';
            }
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
        $social = [
            'twitter'=>$this->twitter,
            'linkedin'=>$this->linkedin,
            'instagram'=>$this->instagram,
        ];

        if(is_string($this->image) && $this->image != null){
            $imageName = $image;
        }else{
            $name = Str::slug($name);
            $imageName = saveImageLocalNew($this->image, 'teams/',$name);
        }

        $this->edit->update([
            'image' => $imageName,
            'name'  => $this->name,
            'title' => $title,
            'up_lv' => 1,
            'extend'=> json_encode($social)
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Team Saved');
        return redirect()->route('team.medlinx');

    }
    public function render()
    {
         return view('livewire.pages.teams.medlinx-edit');
    }
}
