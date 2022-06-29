<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use  App\Models\UsuariosModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginControler extends Controller
{
    public function indexAction()
    {
        return view('auth.login');
    }

    public function authenticateAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/meta/novo');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logoutAction()
    {
        return redirect('login')->with(Auth::logout());
    }

    public function geraHashAction(Request $request)
    {
        $hashGerada = '';
        if ($request->hash)
            $hashGerada = Hash::make($request->hash);


        return view('auth.gerahash',  ['hashGerada' => $hashGerada]);
        //Hash::make();
    }
}
