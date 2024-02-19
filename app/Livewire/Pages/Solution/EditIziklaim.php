<?php

namespace App\Livewire\Pages\Solution;

use App\Models\Solution;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditIziklaim extends Component
{
    use WithFileUploads;
    
    #[Title('Edit Solution')] 
    public $model,$image,$miniImage,$svg,$title,$subtitle,$left,$right,$url,$postion;
    public $extend  = [];

    public function mount($id){
        $this->model = Solution::find($id);
        $cms = $this->model;
        $extend	 = json_decode($cms?->extend,true);	
        $this->title = $cms->title;
        $this->subtitle = $cms->sub_title;
        $this->image = $extend['image'];
    
        if (isset($extend['mini_image'])) {
            $this->miniImage = $extend['mini_image'];
        }
        if (isset($extend['svg'])) {
            $this->svg = $extend['icon'];
        }
        $this->postion   = $extend['img_postion'];
        $this->dispatch('setSubTitle',$cms->sub_title);
        $button = $extend['button'] ?? false;
        if($button){
            $data[] = ['name'=>$button['name'],'val'=>$button['val']];
            $this->fill([
                'extend' => collect($data),
            ]);
        }
    }
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
        
        $cms = $this->model;

        $extend	 = json_decode($cms?->extend,true);	

        
        if(is_string($this->image) && $this->image != null){
            $imageName = $extend['image'];
            $data['image'] = $imageName;
        }else{
            $name = 'iziklaim-solution-img-'. $cms->id;
            $imageName = saveImageLocalNew($this->image, 'Solution/iziklaim',$name);
            $data['image'] = $imageName;
        }

        if (is_string($this->miniImage) && $this->miniImage != null) {
            $miniImage = $extend['mini_image'];
            $data['mini_image'] = $miniImage;
        }else{
           if( $this->miniImage != null){
               $name = 'iziklaim-solution-mini-img-'. $cms->id;
               $mini_img = saveImageLocalNew($this->miniImage, 'Solution/iziklaim',$name);
               $data['mini_image'] = $mini_img;
           }
        }
       
        if($this->svg != null  && is_string($this->svg)){
            $icon = $extend['icon'];
            $data['icon'] = $icon;
        }else{
            if($this->svg != null){
                $icon = saveImageLocalNew($this->svg, 'Solution/iziklaim');
                $data['icon'] = $icon;
            }
            
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
        if($cms->sub_title == $this->subtitle){
            $subtitle = $cms->sub_title;
        }else{
            $subtitle = insertIcon($this->subtitle);
        }
        $cms->update([
            'app_id'  => 3,
            'title'     => $title,
            'sub_title'  => $subtitle,
            'extend'    => json_encode($data)
        ]);
        $this->dispatch('sweet-alert',icon:'success',title:'Solution Saved');
        return redirect()->to('/iziklaim-solution');
    }

    public function render()
    {
        return view('livewire.pages.solution.edit-iziklaim');
    }
}
