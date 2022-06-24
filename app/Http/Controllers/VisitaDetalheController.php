<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitasDetalheModel;

class VisitaDetalheController extends Controller
{
    public function novoAction(){

        $dados = VisitasDetalheModel::where('id_cliente',1)->get();
        return view('/visitadetalhe/novo', ['dados' => $dados]);
    }

    public function insertAction(Request $request){
        
        $dados = $request->all();
        $dados['id_cliente'] = 1;
        
        VisitasDetalheModel::insert($dados);
        
        return redirect('/visitadetalhe/novo');
    }

    public function updateAction(Request $request){
        
        $dados = $request->all();
        $dados['id_cliente'] = 1;
        
        VisitasDetalheModel::where('id_cliente', $dados['id_cliente'])
                    ->where('id', $dados['id'])
                    ->update($dados);
    }

    public function deleteAction(Request $request){
        $dados = $request->all();
        VisitasDetalheModel::destroy($dados['id']);
    }
}
