<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('author', AuthorController::class);