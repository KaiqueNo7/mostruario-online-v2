<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class ShowcaseController extends Controller
{
    public function view(string $showcase): View   
    {
        $user = User::where('name', str_replace('-', ' ', $showcase))->first();
        $name = $user->name;

        return view('showcase', ['id' => $user, 'user' => $name]);
    }
}
