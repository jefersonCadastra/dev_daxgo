<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Hash
};

class AuthController extends Controller
{
    public function index()
    {
        if (!Auth::check())
            return view('auth.login');

        return redirect()->intended(route('metas.index'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->intended(route('metas.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function geraHash(Request $request)
    {
        $hashGerada = '';

        if ($request->hash)
            $hashGerada = Hash::make($request->hash);

        return view('auth.gerahash',  ['hashGerada' => $hashGerada]);
    }
}
