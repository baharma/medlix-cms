<?php

namespace App\Livewire\Pages;

use App\Models\CmsApp;
use App\Models\Event as ModelsEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Event')]
#[On('eventreload')]

class Event extends Component
{
    public $model,$appCmsDefault,$event,$daeraes;
    public $searchEvent;
    protected $listeners = ['updateEvent'];
    public function mount(ModelsEvent $modelEvent){
        $this->model = $modelEvent;
        $this->appCmsDefault = CmsApp::find(Auth::user()->default_cms);
        $this->event = $this->appCmsDefault->Event;
    }
    public function render()
    {

        return view('livewire.pages.event');
    }

    public function updateEvent()
    {
        $this->appCmsDefault->refresh();
        $this->event = $this->appCmsDefault->Event;
    }

    public function eventreload(){
        $this->render();
    }

    public function confirmDelete($id){
        $event = $this->model->find($id);
        Storage::disk('images_local')->delete('event/'.$event->image);
        $event->delete();
        $this->updateEvent();
    }
    public function editEvent($id){
        $this->dispatch('editEvent',$id);
    }
    public function closeEdit(){
        $this->dispatch('clearText');
    }
}
