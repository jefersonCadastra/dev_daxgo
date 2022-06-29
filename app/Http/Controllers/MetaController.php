<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetasModel;
use Illuminate\Support\Facades\Auth;

class MetaController extends Controller
{
    public function novoAction()
    {
        $id_cliente = Auth::user()->id_cliente;
        $dados = MetasModel::where('id_cliente', $id_cliente)->get();
        return view('/meta/novo', ['dados' => $dados]);
    }

    public function insertAction(Request $request)
    {
        $dados = $request->all();
        $dados['id_cliente'] = 1;

        MetasModel::insert($dados);

        return redirect('/meta/novo');
    }

    public function updateAction(Request $request)
    {
        $dados = $request->all();
        $dados['id_cliente'] = 1;

        MetasModel::where('id_cliente', $dados['id_cliente'])
            ->where('id', $dados['id'])
            ->update($dados);
    }

    public function deleteAction(Request $request)
    {
        $id = $request->id;
        MetasModel::destroy($id);
        return redirect('/meta/novo');
    }
}
