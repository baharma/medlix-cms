<?php

namespace App\Livewire\Pages\Solution;

use App\Models\Solution;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Iziklaim extends Component
{
    use WithFileUploads;

    #[Title('Solution')]
    public $model,$image,$miniImage,$svg,$title,$subtitle,$left,$right,$url,$postion;
    public $extend  = [];

    public function mount(){
        $this->model = Solution::where('app_id',3)->get();
    }
    #[On('extendVar')]
    public function extendVar(){
        $data[] = ['name'=>'','val'=>''];
        $this->fill([
            'extend' => collect($data),
        ]);
    }
    protected $rules = [
        'image'=>'required',
        'title'=>'required',
        'postion'=>'required'
    ];

    public function clearText(){
        $this->fill([
            'image'=>null,
            'title'=>null,
            'postion'=>null,
            'miniImage'=>null,
            'svg'=>null,
            'subtitle'=>null
        ]);

        $this->resetErrorBag('image');
        $this->resetErrorBag('title');
        $this->resetErrorBag('postion');
        $this->dispatch('clearImage');
    }

    public function addItem()
    {
        $this->extendVar();
        // $this->extend[] = '';
    }
    public function removeItem($index)
    {
        unset($this->extend[$index]);
    }
    public function save(){
        $this->validate();
        $cms = $this->renderRefresh();

        $extend	 = json_decode($cms?->extend,true);
        $name = 'iziklaim-solution-img-'. $cms?->id + 1;
        $imageName = saveImageLocalNew($this->image, 'solution',$name);
        $data['image'] = $imageName;

        if($this->miniImage){
            $name = 'iziklaim-solution-mini-img-'. $cms?->id + 1;
            $mini_img = saveImageLocalNew($this->miniImage, 'solution',$name);
            $data['mini_image'] = $mini_img;
        }
        if($this->svg){
            $icon = saveImageLocalNew($this->svg, 'solution');
            $data['icon'] = $icon;
        }
        $data['img_postion'] = $this->postion;

        if($this->extend){
            foreach ($this->extend as $key => $value) {
                $data['button'] = ['name'=>$value['name'],'val'=>$value['val'],];
            }
            $data['defauult'] = 1;
        }else{
            $data['defauult'] = 0;
        }
        $title = $this->title;
        $subtitle = insertIcon($this->subtitle);
        Solution::create([
            'app_id'  => 3,
            'title'     => $title,
            'sub_title'  => $subtitle,
            'extend'    => json_encode($data)
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Solution Saved');
        $this->reset();
        $this->dispatch('modalClosed');
        $this->dispatch('reloadPage');
        $this->mount();
    }

    public  function editEvent($id){
        $cms  = Solution::where('id',$id)->first();
        $extend	 = json_decode($cms?->extend,true);
        $this->title = $cms->title;
        $this->subtitle = $cms->sub_title;

        $this->dispatch('setImage',$extend['image']);


        if (isset($extend['mini_image'])) {
            $this->dispatch('setMiniImage',$extend['mini_image']);
        }
        $this->postion   = $extend['img_postion'];
        $this->dispatch('setSubTitle',$cms->sub_title);

    }

     public function confirmDelete($id)
    {
        $section = Solution::find($id);
        if(!$section){
            $this->dispatch('sweet-alert',icon:'error',title:'Delete Failed');
        }
        $section->delete();

        $this->mount();
        $this->dispatch('sweet-alert',icon:'success',title:'Solution Deleted');

    }

    public function renderRefresh(){
        return Solution::where('app_id',3)->orderByDesc('id')->first();
    }
    public function render()
    {
        return view('livewire.pages.solution.iziklaim');
    }
}
