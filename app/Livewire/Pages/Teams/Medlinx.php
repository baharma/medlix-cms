<?php

namespace App\Livewire\Pages\Teams;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Medlinx extends Component
{
    use WithFileUploads;
    #[Title('Teams')]
    public $model,$image,$name,$title,$upLv,$team,$only,$edit,$twitter,$linkedin,$instagram;
    public function mount(){
        $this->model = Team::where('app_id',1)->get();
    }

    public function save()
    {
        $this->validate([
            'image' => 'required', // Adjust max file size as needed
            'name' => 'required',
        ]);

        $image = $this->image;
        $name = $this->name;
        $title = $this->title;
        $twitter = $this->twitter??'#';
        $linkedin = $this->linkedin??'#';
        $instagram = $this->instagram??'#';
        $social = [
            'twitter'=>$twitter,
            'linkedin'=>$linkedin,
            'instagram'=>$instagram,
        ];

        if (is_string($this->image) && $this->image != null) {
            $imageName = $image;
        } else {
            $name = Str::slug($name);
            $imageName = saveImageLocalNew($this->image, 'teams', $name);
        }

        Team::create([
            'app_id' => 1,
            'image' => $imageName,
            'name' => $this->name,
            'title' => $title,
            'up_lv' => 1,
            'extend'=> json_encode($social)
        ]);

       $this->dispatch('sweet-alert', icon: 'success', title: 'Team Saved');
        $this->dispatch('closeModal');
        $this->render();
        $this->reset();
        $this->mount();
    }

    public function confirmDelete($get_id)
    {
         DB::beginTransaction();
         $team = Team::find($get_id);

         try {
            if($team){
                $team->delete();
                DB::commit();

                $this->dispatch('sweet-alert', icon: 'success', title: 'Team Deleted');
                $this->mount();
                $this->render();
             } else {
                $this->dispatch('sweet-alert', icon: 'error', title: 'Team not found');
             }
         } catch (\Exception $e) {
             DB::rollBack();
             $this->dispatch('sweet-alert', icon: 'error', title: 'An error occurred during deletion, ' . $e->getMessage() );
         }
    }

    public function render()
    {
        return view('livewire.pages.teams.medlinx');
    }
}
