<?php

namespace App\Livewire\Pages;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class News extends Component
{
    #[Title('News')]
    public $app=[];
    protected $rules = [
        'app'=> 'required',
    ];
    public function render()
    {
        $data = Article::where(function ($query) {
            $query->where('app_id', '=', Auth::user()->default_cms)
                  ->orWhere('app_id', '=', 0);
        })->get();

        return view('livewire.pages.news',compact('data'));
    }
    public function confirmDelete($get_id){
        $data = Article::find($get_id);
        $data->delete();
        $this->dispatch('sweet-alert', ['icon' => 'success', 'title' => 'New Event Added']);
    }

    public function toForm(){
        return to_route('News.oper', ['AppIdArray' => implode(',', $this->app)]);

    }
    public function getValue($id){

    }
}
