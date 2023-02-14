<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CategoryComponent extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $name, $description,$customFileName, $search, $selected_id, $image, $componentName;
    public $identificador;
    private $pagination = 5;

    protected $listeners = ['destroy'];

    public function mount(){
        $this->componentName = "Categorias";
        $this->identificador = rand();
        $this->categoryCount();
    }

    public function categoryCount(){
        $this->categoryCount = Category::count();
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetUI();
        $this->identificador = rand();
        $this->categoryCount();
    }

    public function edit($id){

        $record = Category::find($id, ['id', 'name', 'description']);

        $this->name = $record->name;
        $this->description = $record->description;
        $this->selected_id = $record->id;
    }

    public function update(){

        $category = Category::find($this->selected_id);

        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->resetUI();
        $this->identificador = rand();
    }

    public function destroy(Category $category){

        $category->delete();

        $this->resetUI();
        $this->emit('category-deleted');
        $this->categoryCount();
    }

    public function resetUI(){
        $this->name = '';
        $this->description = '';
        $this->search = '';
        $this->selected_id = 0;

        $this->identificador = rand();
    }

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }
    public function render()
    {
            if(strlen($this->search > 0)){
                $categories = Category::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
            }else{
                $categories = Category::orderBy('id', 'desc')->paginate($this->pagination);
            }
            return view('livewire.category.category-component', compact('categories'))
                    ->extends('layouts.template.main')
                    ->section('content');
    }
}
