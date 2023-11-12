<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowcaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/mo/{showcase}', [ShowcaseController::class, 'view'])->name('showcase.view');
Route::get('/mo/{showcase}/{category}', [ShowcaseController::class, 'render'])->name('showcase.category');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categories', [DashboardController::class, 'category'])->name('view.category'); 
    Route::get('/products', [DashboardController::class, 'products'])->name('view.products'); 
});

require __DIR__.'/auth.php';
