<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});

Route::get('/item/{id}', [ItemController::class, 'detail']);

Route::get('/item', [ItemController::class, 'index']);

Auth::routes();

Route::get('/home', [
  App\Http\Controllers\HomeController::class,
  'index',
])->name('home');
