<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Hash
};

class AuthController extends Controller
{
    public function geraHash(Request $request)
    {
        $hashGerada = '';

        if ($request->hash)
            $hashGerada = Hash::make($request->hash);

        return view('auth.gerahash',  ['hashGerada' => $hashGerada]);
    }
}
