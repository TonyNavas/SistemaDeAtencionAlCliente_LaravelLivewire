<?php

namespace App\Http\Livewire;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $description, $image, $price, $category_id, $search, $selected_id, $identificador;
    protected $pagination = 5;
    public $productCount;

    public function mount()
    {

        $this->productCount = Product::count();
        $this->identificador = rand();
    }
    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function store()
    {

        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category_id' => 'required',
        ]);

        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/products', $customFileName);
            $product->image = $customFileName;
            $product->save();
        }
    }

    public function edit($id)
    {

        $recordProducts = Product::find($id);

        $this->name = $recordProducts->name;
        $this->description = $recordProducts->description;
        $this->price = $recordProducts->price;
        $this->category_id = $recordProducts->category_id;
        $this->image = null;
        $this->selected_id = $recordProducts->id;
    }

    public function resetUI()
    {
        $this->name = '';
        $this->description = '';
        $this->image = null;
        $this->price = '';
        $this->search = '';
        $this->selected_id = 0;

        $this->category_id = 0;

        $this->identificador = rand();
    }

    public function render()
    {
        if (strlen($this->search > 0)) {
            $products = Product::where('name', 'like', "%{$this->search}%")
                ->orWhere('price', 'like', "%{$this->search}%")
                ->paginate($this->pagination);
        } else {
            $products = Product::orderBy('id', 'desc')->paginate($this->pagination);
        }
        return view('livewire.products.product-component', compact('products'))
            ->extends('layouts.template.main')
            ->section('content');
    }
}
