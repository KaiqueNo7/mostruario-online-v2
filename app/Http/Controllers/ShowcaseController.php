<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class ShowcaseController extends Controller
{
    public function view(string $showcase): View   
    {
        $id = User::where('name', str_replace('-', ' ', $showcase))->get();

        foreach($id as $id){
           $name = $id->name;
        }

        return view('showcase', ['id' => $id, 'user' => $name]);
    }
}
