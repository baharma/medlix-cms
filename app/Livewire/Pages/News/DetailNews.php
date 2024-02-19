<?php

namespace App\Livewire\Pages\News;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Component;

class DetailNews extends Component
{
    #[Title('Detail News')]

    public $artikelId;
    public function render()
    {
        $news = Article::find($this->artikelId);
        return view('livewire.pages.news.detail-news',compact('news'));
    }

    public function mount(){

    }
}
