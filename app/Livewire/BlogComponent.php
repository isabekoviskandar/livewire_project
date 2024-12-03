<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class BlogComponent extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.blog-component')->layout('components.layouts.blog');
    }
}
