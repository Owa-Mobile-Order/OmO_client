<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyPolicyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});

Route::get('/order/{id}', [OrderController::class, 'detail']);
Route::get('/order', [OrderController::class, 'index'])->name('order');

Route::get('/terms', [TermsController::class, 'index']);
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);

Route::middleware('auth')->group(function () {
  Route::get('/settings', [ProfileController::class, 'edit'])->name(
    'profile.edit'
  );
  Route::patch('/settings', [ProfileController::class, 'update'])->name(
    'profile.update'
  );
  Route::delete('/settings', [ProfileController::class, 'destroy'])->name(
    'profile.destroy'
  );
});

require __DIR__ . '/auth.php';
