<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowcaseController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

Route::get('/login/google/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('auth/google/callback', function(){
    $googleUser = Socialite::driver('google')->user();

    $user = User::query()->firstOrCreate(['email' => $googleUser->email], [
        'name' => $googleUser->name,
        'password' => bcrypt(Str::random(10)),
    ]);

    auth()->login($user);

    return redirect()->route('dashboard');
});

Route::get('/terms-and-services', function(){
    return view('terms-and-services');
})->name('terms-and-services');

Route::get('/privacy-policy', function(){
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::get('/mo/{showcase}', [ShowcaseController::class, 'view'])->name('showcase.view');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/categories', [DashboardController::class, 'category'])->name('view.category'); 
    Route::get('/products', [DashboardController::class, 'products'])->name('view.products'); 
});

require __DIR__.'/auth.php';
