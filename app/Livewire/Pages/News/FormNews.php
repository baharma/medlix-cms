<?php

namespace App\Livewire\Pages\News;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class FormNews extends Component
{
    use WithFileUploads;

    #[Title('News Form')]

    public $artikelId;
    public $title, $thumbnail, $description,$check,$slug;
    protected $rules = [
        'title' => 'required|min:5',
        'thumbnail'=> 'required',
    ];
    public function render()
    {
        return view('livewire.pages.news.form-news');
    }
    public function mount(){
        if($this->artikelId){
            $data = Article::find($this->artikelId);
            $this->slug  = $data->slug;
            $this->title = $data->title;
            $this->thumbnail = $data->thumbnail;
            $this->description = $data->description;
        }
    }
    public function save(){
        $this->validate();
        if($this->thumbnail->isFile()){
            $thumbnail = saveImageLocal($this->thumbnail, 'news/thumbnail');
        }else{
            $artikel = Article::find($this->artikelId);
            $thumbnail = $artikel->thumbnail;
        }

        $data = [
            'app_id' => Auth::user()->default_cms,
            'slug'  => Str::slug($this->title),
            'title' => $this->title,
            'thumbnail' => $thumbnail,
        ];
        if ($this->check) {
            $this->validate(['check' => 'required']);
            $data['check'] = $this->check;
        }
        else {
            $this->validate(['description' => 'required']);
            $data['description'] = $this->description;
        }
        if($this->artikelId){
            $artikel->update($data);
            $this->dispatch('sweet-alert', ['icon' => 'success', 'title' => 'New News Update']);
        }else{
            $artikel =  Article::create($data);
            $this->dispatch('sweet-alert', ['icon' => 'success', 'title' => 'New News Added']);
        }
        $this->reset(['title', 'thumbnail', 'check', 'description']);
        return to_route('artikel.detail',$artikel->id);
    }

}
