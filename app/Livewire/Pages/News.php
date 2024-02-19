<?php

namespace App\Livewire\Pages;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

class News extends Component
{
    #[Title('News')]

    public function render()
    {
        $data = Article::all();
        return view('livewire.pages.news',compact('data'));
    }
    public function confirmDelete($get_id){
        $data = Article::find($get_id);
        $data->delete();
        $this->dispatch('sweet-alert', ['icon' => 'success', 'title' => 'New Event Added']);
    }
}
