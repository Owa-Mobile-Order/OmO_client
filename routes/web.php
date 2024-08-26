<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});

Route::get('/order/{id}', [OrderController::class, 'detail']);
Route::get('/order', [OrderController::class, 'index']);

Route::get('/login', [LoginController::class, '__construct']);

Auth::routes();

Route::get('/home', [
  App\Http\Controllers\HomeController::class,
  'index',
])->name('home');
