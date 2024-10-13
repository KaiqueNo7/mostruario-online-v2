<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\View as ModelsView;
use Illuminate\Contracts\View\View;

class ShowcaseController extends Controller
{
    public function view(string $showcase): View
    {
        $nameInUrl = str_replace('-', ' ', $showcase);
        $user = User::where('name', $nameInUrl)->first();
        
        if (!$user) {
            abort(404);
        }

        $sessionId = session()->getId();
        $existingView = ModelsView::where('session_id', $sessionId)->first();

        if (!$existingView) {
            ModelsView::create([
                'session_id' => $sessionId,
                'id_showcase' => $user->id,
            ]);
        }

        return view('showcase', [
            'user' => $user,
        ]);
    }
}
