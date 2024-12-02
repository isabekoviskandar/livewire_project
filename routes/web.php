<?php

use App\Livewire\CategoryComponent;
use App\Livewire\PostComponent;
use Illuminate\Support\Facades\Route;



Route::get('/' , CategoryComponent::class);
Route::get('/post' , PostComponent::class);
