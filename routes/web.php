<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowcaseController;
use App\Mail\WelcomeMessage;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

Route::get('/login/google/redirect', function () {
    return Socialite::driver('google')->stateless()->redirect();
})->name('login.google');

Route::get('auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::query()->firstOrCreate(['email' => $googleUser->email], [
        'name' => $googleUser->name,
        'phone' => $googleUser->phone,
        'password' => bcrypt(Str::random(10)),
    ]);

    if ($user->wasRecentlyCreated) {
        $defaultCategories = [
            ['name' => 'Anéis', 'id_user' => $user->id],
            ['name' => 'Argolas', 'id_user' => $user->id],
            ['name' => 'Brincos', 'id_user' => $user->id],
            ['name' => 'Cordões', 'id_user' => $user->id],
            ['name' => 'Pingentes', 'id_user' => $user->id],
            ['name' => 'Pulseiras', 'id_user' => $user->id],
        ];

        Category::insert($defaultCategories);

        Mail::to($user->email)->send(new WelcomeMessage($user));
    }

    auth()->login($user);

    return redirect()->route('dashboard');
});

Route::get('/terms-and-services', function () {
    return view('terms-and-services');
})->name('terms-and-services');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
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
