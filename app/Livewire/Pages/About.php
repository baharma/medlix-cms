<?php

namespace App\Livewire\Pages;

use App\Models\About as ModelsAbout;
use App\Models\AboutList;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

use function PHPUnit\Framework\isNull;

#[Title('About')]

class About extends Component
{
    use WithFileUploads;
    
    public $model, $image, $title,$subtitle;
    public $toArr = [];
    public $lists = [];
    public $fistList;

    public function mount(){
        $this->model = ModelsAbout::where('app_id',auth()->user()->default_cms)->first();
        if (!$this->model) {
            $this->image = '';
            $this->title = '';
            $this->subtitle = '';
            $this->lists = [];
           
        }else{
            $this->image = $this->model->image;
            $this->title = $this->model->title;
            $this->lists = json_decode($this->model->list);
            $this->subtitle = json_decode($this->model->list,true);
        }
      
    }

    public function addItem()
    {
        $this->lists[] = '';
    }
    public function removeItem($index)
    {
        unset($this->lists[$index]);
    }
     public function removeArr()
    {
        unset($this->fistList);
    }
    
    public function save(){
        if ($this->fistList != '') {
            $this->toArr = [ $this->fistList ];
        }
        foreach ($this->lists as $list) {
            if ($list == '') {
                continue;
            }
            $this->toArr[] = $list;
        }

        $cms = $this->renderRefresh();
        if (is_string($this->image)) {
            $imageName = $cms->image;
        } else {
            $imageName = saveImageLocal($this->image, 'About');
        }
        DB::beginTransaction();
        try {
            ModelsAbout::updateOrCreate(['app_id'=>auth()->user()->default_cms], [
                'app_id'=> auth()->user()->default_cms,
                'image'=> $imageName,
                'title'=> $this->title,
                'list'=> json_encode($this->toArr)

            ]);
            DB::commit();
            $this->dispatch('sweet-alert',icon:'success',title:'Data About Saved');
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('sweet-alert',icon:'error',title:'Error: ' . $th->getMessage() );

        }

    }


    public function render()
    {
        return view('livewire.pages.about');
    }
    public function renderRefresh(){
        return ModelsAbout::where('app_id',auth()->user()->default_cms)->first();
    }

}
