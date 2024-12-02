<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $posts;
    public $categories;  // Declare a property for categories
    public $category_id; // Declare a property for selected category
    public $name, $title, $text, $post_id;

    public function mount($post_id = null)
    {
        $this->categories = Category::all();  // Fetch all categories
        $this->posts = Post::all();  // Fetch all posts
        if ($post_id) {
            $post = Post::find($post_id);
            $this->post_id = $post->id;
            $this->name = $post->name;
            $this->title = $post->title;
            $this->text = $post->text;
            $this->category_id = $post->category_id; // Set the selected category
        }
    }

    public function create()
    {
        $this->validate([
            'category_id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);

        Post::create([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'text' => $this->text,
        ]);
        $this->resetInputFields();
        $this->posts = Post::all();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $this->posts = Post::all();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $post->id;
        $this->category_id = $post->category_id;
        $this->title = $post->title;
        $this->text = $post->text;
    }

    public function update()
    {
        $this->validate([
            'category_id' => 'required',
            'title' => 'required',
            'text' => 'required',
        ]);

        $post = Post::findOrFail($this->post_id);

        $post->update([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'text' => $this->text,
        ]);

        $this->resetInputFields();
        $this->posts = Post::all();
    }

    public function resetInputFields()
    {
        $this->category_id = '';
        $this->title = '';
        $this->text = '';
        $this->post_id = null;
    }

    public function render()
    {
        return view('livewire.post-component');
    }
}
