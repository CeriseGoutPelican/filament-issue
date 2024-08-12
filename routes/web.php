<?php

use App\Livewire\Test;
use App\Livewire\Test2;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', Test::class);
Route::get('/test2', Test2::class);
