<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitasModel;

class VisitaController extends Controller
{
    public function novoAction(){

        $dados = VisitasModel::where('id_cliente',1)->get();
        return view('/visita/novo', ['dados' => $dados]);
    }

    public function insertAction(Request $request){
        
        $dados = $request->all();
        $dados['id_cliente'] = 1;
        
        VisitasModel::insert($dados);
        
        return redirect('/visita/novo');
    }

    public function updateAction(Request $request){
        
        $dados = $request->all();
        $dados['id_cliente'] = 1;
        
        VisitasModel::where('id_cliente', $dados['id_cliente'])
                    ->where('id', $dados['id'])
                    ->update($dados);
    }

    public function deleteAction(Request $request){
        $dados = $request->all();
        VisitasModel::destroy($dados['id']);
    }
}
