<?php

namespace App\Livewire\Pages\Produk;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProdukForm extends Component
{
    use WithFileUploads;
    #[Title('Form Produk')]
    public $model,$idproduk,$product;
    public $image,$logo,$text,$url;
    protected $rules = [
        'image'=> 'required',
        'logo'=>'required',
        'text'=>'required',
        'url'=>'required'
    ];
    public function mount(Product $product){
        $this->model = $product;
        if($this->idproduk){
            $data = $this->model->find($this->idproduk);
            $this->fill([
                'image'=>$data->image,
                'logo'=>$data->logo,
                'text'=>$data->text,
                'url'=>$data->url
            ]);
            $this->product = $data;
        }
    }

    public function save(){
        $this->validate();

        if(is_string($this->image)){
            $image = $this->image;
        }else{
            $image = saveImageLocal($this->image,'produk/image');
        }

        if(is_string($this->logo)){
            $logo = $this->logo;
        }else{
            $logo = saveImageLocal($this->logo,'produk/logo');
        }

        $data = [
            'app_id'=>Auth::user()->default_cms,
            'text'=>$this->text,
            'url'=>$this->url,
            'image'=>$image,
            'logo'=>$logo
        ];

        if($this->idproduk){
            $this->product->update($data);
            $this->dispatch('sweet-alert', icon:'success', title: 'New Product Update');

        }else{
            $this->model->create($data);
            $this->dispatch('sweet-alert', icon:'success', title: 'New Product Created');

        }


        $this->reset(['text', 'url', 'image', 'logo']);
        return to_route('produk');
    }

    public function render()
    {
        return view('livewire.pages.produk.produk-form');
    }
}
