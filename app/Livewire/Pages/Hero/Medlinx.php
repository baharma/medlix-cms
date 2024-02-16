<?php

namespace App\Livewire\Pages\Hero;

use App\Models\AppHero;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
#[Title('Hero Page')]

class Medlinx extends Component
{
    use WithFileUploads;

    public $image,$title,$model,$action,$count,$editEmit;
    public $extend  = [];

    public function mount(){
        $this->model = AppHero::where('app_id',1)->get();
        $this->count = $this->model->count();

   
    }
    public function save(){
        if ($this->editEmit) {
            $hero  =  AppHero::find($this->editEmit);
            if ($hero?->image == $this->image) {
                $imageName = $hero->image;        
            } else {
                $name  = $hero->image;
                $imageName = saveImageLocalnew($this->image, 'Hero/iziklaim',$name);
            }
            
            
            $hero->update([
                'app_id' => 1,
                'image'  => $imageName,
                'title'  => $this->title,
                'subtitle' => null,
                'extend' => json_encode(['btn_action'=>$this->action])
            ]);
             $this->dispatch('sweet-alert',icon:'success',title:'Heros Page Updated');
        }else{
            $cms = $this->renderRefresh();
            if ($cms?->image == $this->image) {
                $imageName = $cms->image;        
            } else {
                $name  = 'iziklaim-hero-img-'.$this->count;
                $imageName = saveImageLocalnew($this->image, 'Hero/iziklaim',$name);
            }
            
            AppHero::create([
                'app_id' => 1,
                'image'  => $imageName,
                'title'  => $this->title,
                'subtitle' => null,
                'extend' => json_encode(['btn_action'=>$this->action])
            ]);
            $this->dispatch('sweet-alert',icon:'success',title:'Heros Page Saved');
        }
        $this->resetform();
        $this->dispatch('modalClosed');
        $this->mount();
    }
    public function confirmDelete($get_id)
    {
        $hero = AppHero::find($get_id);
        if(!$hero){
             $this->dispatch('sweet-alert',icon:'error',title:'Heros not found!');
        }else{
            $hero->delete();
             $this->dispatch('sweet-alert',icon:'success',title:'Heros deleted!');
             $this->mount();
             $this->render();

        }
    }

    public function resetform(){
        $this->image = '';
        $this->title = '';
        $this->action = '';
    }
    
    public function editEvent($id)
    {
        $this->editEmit = $id;
        $data = AppHero::find($id);
        $this->dispatch('sentToImage',$data->image);

        $this->image = $data->image;
        $this->title = $data->title;
         $this->action = json_decode($data->extend,true)['btn_action'];
    }
    public function renderRefresh(){
        return AppHero::where('app_id',1)->first();
    }
    public function render()
    {
        return view('livewire.pages.hero.medlinx');
    }
}
