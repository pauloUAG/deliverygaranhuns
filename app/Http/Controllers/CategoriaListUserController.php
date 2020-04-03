<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriaListUserController extends Controller
{
    public function listUser(Request $request) {
        
        $usuarios = \App\User::whereRaw('tipo like \'ADMIN\'')->select('id')->get();
        
        //$estabelecimentos = \App\Estabelecimento::whereIn("modalidade_id", $categorias)->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("iser_id", $usuarios)->get();

        $cidade = (Session::has('cidade'))?Session::get('cidade'):'Garanhuns';
        
        $lista = \App\Estabelecimento::
            where('status', 'Pendente')->get();

        $estabelecimentos = array();
        foreach($lista as $estabelecimento) {
            if($estabelecimento->endereco->cidade == $cidade) {
                $estabelecimentos[] = $estabelecimento;
            }
        }
        return dd($estabelecimentos);
        // return view("categoria.show")->with(['estabelecimentos' => $estabelecimentos]);
    }
}
