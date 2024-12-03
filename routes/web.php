<?php

use App\Livewire\BlogComponent;
use App\Livewire\BlogDetailsComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\PostComponent;
use Illuminate\Support\Facades\Route;



Route::get('/' , CategoryComponent::class);
Route::get('/post' , PostComponent::class);
Route::get('/blog' , BlogComponent::class);


