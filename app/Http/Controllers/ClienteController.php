<?php

namespace App\Http\Controllers;
use  App\Models\ClientesModel;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function insertAction(){

    }

    public function updateAction(){

    }

    public function deleteAction(){

    }

    public function consultaAction(){
        
    }

    public function listarAction(){

        $flights = ClientesModel::all();
 
foreach ($flights as $flight) {
    echo $flight->nome;
}

die;
        // $flights = ClientesModel::all();
        // dd($flights);
        // die('foo');
    }
}
