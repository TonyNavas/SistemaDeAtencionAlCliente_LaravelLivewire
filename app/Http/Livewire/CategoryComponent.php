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

    public function clearImage(){

        $this->image = null;
        $this->identificador = rand();
    }

    public function store(){

        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $category = Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $category->image = $customFileName;
            $category->save();
        }
        $this->resetUI();
        $this->identificador = rand();
        $this->categoryCount();
    }

    public function edit($id){

        $record = Category::find($id, ['id', 'name', 'description', 'image']);

        $this->name = $record->name;
        $this->description = $record->description;
        $this->image = null;
        $this->selected_id = $record->id;
    }

    public function update(){

        $category = Category::find($this->selected_id);

        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        if($this->image){
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $imageName = $category->image;

            $category->image = $customFileName;
            $category->save();

            if($imageName != null){
                if(file_exists('storage/categories' . $imageName)){
                    unlink('storage/categories' . $imageName);
                }
            }
        }

        $this->resetUI();
        $this->identificador = rand();
    }

    public function destroy(Category $category){

        $imageName = $category->image;
        $category->delete();

        if($imageName != null){
            unlink('storage/categories/' . $imageName);
        }

        $this->resetUI();
        $this->emit('category-deleted');
        $this->categoryCount();
    }

    public function resetUI(){
        $this->name = '';
        $this->description = '';
        $this->image = null;
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
