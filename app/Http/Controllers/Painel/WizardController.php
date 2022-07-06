<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WizardController extends Controller
{
    public function step(Request $request)
    {
        return view('painel.wizard.step-' . $request->step);
    }
}
