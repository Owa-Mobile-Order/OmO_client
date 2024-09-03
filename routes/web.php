<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Middleware\EnsureOrderCompleted;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('index');
});

Route::post('/order/{id}', [OrderController::class, 'submit']);
Route::get('/order/{id}', [OrderController::class, 'detail']);
Route::get('/order', [OrderController::class, 'index'])->name('order');

Route::get('/terms', [TermsController::class, 'index']);
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);

Route::patch('/dashboard/update/{id}', [
  OrderController::class,
  'update',
])->name('dashboard.update');
Route::get('/dashboard/{id}', [OrderController::class, 'order'])->name(
  'dashboard.detail'
);
Route::get('/dashboard', [OrderController::class, 'orders'])->name('dashboard');

Route::get('/error', function () {
  return view('order.error');
});

Route::middleware(['web', EnsureOrderCompleted::class])->group(function () {
  Route::get('/thanks', function () {
    return view('order.thanks');
  });
});

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
