<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('author', AuthorController::class);
route::resource('book', BookController::class);
route::resource('publisher', PublisherController::class);