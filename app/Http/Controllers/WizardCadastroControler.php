<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientesModel;
use Exception;

class WizardCadastroControler extends Controller
{
    public function wizardAction(){
        
        $cliente = new ClientesModel();
        $cliente->nome = 'Nome';
        $cliente->email = 'Mail';
        $cliente->account_ga = 'Bar';

        $cliente->save();

        die;


        try{
        $foo = new ClientesModel();
        
        $flights = $foo::all();
        
        }catch(Exception $e){
            var_dump($e);
        }

        dd($flights);

        return view('wizard');
    }
}
