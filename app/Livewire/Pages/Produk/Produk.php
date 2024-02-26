<?php

namespace App\Livewire\Pages\Produk;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Produk extends Component
{
    #[Title('Produk')]
    public $model;

    public function mount(Product $product){
        $this->model = $product;
    }
    public function confirmDelete($get_id){
        $this->model->find($get_id)->delete();
    }

    public function render()
    {
        $data = $this->model->where('app_id',Auth::user()->default_cms)->get();
        return view('livewire.pages.produk.produk',compact('data'));
    }

}
