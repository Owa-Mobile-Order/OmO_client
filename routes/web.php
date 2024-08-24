<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});

Route::get('/item/{id}', [ItemController::class, 'detail']);

Route::get('/order', [ItemController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);

//Auth::routes();

Route::get('/home', [
  App\Http\Controllers\HomeController::class,
  'index',
])->name('home');
