<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WizardCadastroControler extends Controller
{
    public function wizardAction(){
        return view('wizard');
    }
}
