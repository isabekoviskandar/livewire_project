<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $categories;
    public $name;
    public $category_id;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function create()
    {
        $this->validate([
            'name'=>'required|string',
        ]);
        Category::create([
            'name' =>$this->name,
        ]);
        $this->categories = Category::all();
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $this->categories = Category::all();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $this->validate([
            'name'=>'required|string',
        ]);

        $category = Category::findOrFail($this->category_id);
        $category->update(['name'=>$this->name]);
        $this->categories = Category::all();
    }
    public function render()
    {
        return view('livewire.category-component');
    }
}
