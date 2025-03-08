<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMessage;
use App\Models\Category;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new WelcomeMessage($user));

        event(new Registered($user));

        $defaultCategories = [
            ['name' => 'Anéis', 'id_user' => $user->id],
            ['name' => 'Argolas', 'id_user' => $user->id],
            ['name' => 'Brincos', 'id_user' => $user->id],
            ['name' => 'Cordões', 'id_user' => $user->id],
            ['name' => 'Pingentes', 'id_user' => $user->id],
            ['name' => 'Pulseiras', 'id_user' => $user->id],
        ];

        Category::insert($defaultCategories);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
