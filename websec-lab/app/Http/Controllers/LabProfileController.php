<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabProfileController extends Controller
{
    public function edit()
    {
        return view('lab.profile', ['user' => Auth::user()]);
    }

    /**
     * Смена email без CSRF-токена (маршрут исключён из VerifyCsrfToken).
     */
    public function updateEmail(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        Auth::user()->update(['email' => $data['email']]);

        return redirect()->route('profile.edit')->with('status', 'Email обновлён.');
    }
}
