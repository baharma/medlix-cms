<?php

namespace App\Livewire\Pages\Event;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormEvent extends Component
{
    use WithFileUploads;

    public $name, $detail , $image;
    public $editEmit,$model;
    protected $listeners = ['editEvent'];

    protected $rules = [
        'name'=> 'required',
        'image'=>'required'
    ];
    public function mount(Event $event){
        $this->model = $event;
    }
    public function render()
    {
        return view('livewire.pages.event.form-event');
    }

    public function save(){
        $this->validate();
        if($this->editEmit){
            $event = $this->model->find($this->editEmit);
            if ($this->image == $event->image) {
                    $filename = $event->image;
                }else{
                    $filename = saveImageLocal($this->image,'event');

                }
                $dataEvent = [
                    'app_id' => Auth::user()->default_cms,
                    'name' => $this->name,
                    'image' => $filename,
                    'details' => $this->detail ?? '',
                ];
                $event->update($dataEvent);
                $this->dispatch('sweet-alert',icon:'success',title:'Your Event Updated');
        }else{
            if ($this->image && $this->image->isValid()) {
                $filename = saveImageLocal($this->image,'Event');
                }
                $dataEvent = [
                    'app_id' => Auth::user()->default_cms,
                    'name' => $this->name,
                    'image' => $filename,
                    'details' => $this->detail ?? '',
                ];
                $this->model->create($dataEvent);

                $this->dispatch('sweet-alert',icon:'success',title:'New Event Added');
        }
        $this->dispatch('updateEvent');
        $this->clear();
    }

    public function editEvent($id){
        $this->editEmit = $id;
        $event = $this->model->find($id);
        $this->name = $event->name;
        $this->detail = $event->details;
        $this->image = $event->image ;
        $this->dispatch('ImageShow');
        $this->dispatch('sentToImage',$this->image);

    }
    public function handleButtonClick(){
        $this->dispatch('modalClosed');
    }
    #[On('clearText')]
    public function clearText(){
        $this->clear();
    }

    public function clear(){
        $this->name = '';
        $this->detail = '';
        $this->image = '';
        $this->dispatch('clearCancel');
    }

}
