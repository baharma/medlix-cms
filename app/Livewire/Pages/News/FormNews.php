<?php

namespace App\Livewire\Pages\News;

use App\Models\Article;
use App\Models\CmsApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class FormNews extends Component
{
    use WithFileUploads;

    #[Title('News Form')]

    public $artikelId,$app,$cms,$app_id=[];
    public $title, $thumbnail, $description,$check,$slug;
    protected $rules = [
        'title' => 'required|min:5',
        'thumbnail'=> 'required',
        'app_id'=>'required',
    ];
    public function render()
    {
        return view('livewire.pages.news.form-news');
    }
    public function mount(){
        $this->cms = CmsApp::all();
        if($this->artikelId){
            $data = Article::find($this->artikelId);
            $this->slug  = $data->slug;
            $this->title = $data->title;
            $this->thumbnail = $data->thumbnail;
            $this->description = $data->description;
            $this->check = $data->check;
        }
    }
    public function save(){
    $this->validate();

        if(!is_string($this->thumbnail)){
            $thumbnail = saveImageLocal($this->thumbnail, 'news/thumbnail');
        }else{
            $artikel = Article::find($this->artikelId);
            $thumbnail = $artikel->thumbnail;
        }

        $data = [
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
            $check = CmsApp::all()->sortBy('id')->pluck('id')->toArray();
            $arrayDiff = array_diff($check, $this->app_id);
            if (empty($arrayDiff)) {
                $data['app_id'] = 0;
                $dataartikel =  Article::create($data);
            }else{

            $dataartikel = collect($this->app_id)->map(function($event) use ($data){
                    $data['app_id'] = $event;
                    return Article::create($data);
            });
            }
            $artikel = $dataartikel->first();



            $this->dispatch('sweet-alert', ['icon' => 'success', 'title' => 'New News Added']);
        }

        $this->reset(['title', 'thumbnail', 'check', 'description']);

        if ($this->check) {
            return to_route('news');
        }else{
            return to_route('artikel.detail',$artikel);
        }
    }

}
