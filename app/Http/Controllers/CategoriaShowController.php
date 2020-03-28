<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriaShowController extends Controller
{
    public function show($pagina,$id) {
        // dd($pagina);
        if(!Session::has('cidade'))
            Session::put('cidade', 'Garanhuns');
        $estabelecimentos = \App\Estabelecimento::
            where([["modalidade_id", $id],['status', 'Aprovado']])->
            join('enderecos', function ($join) {
                $join->on('enderecos.id', '=', 'estabelecimentos.endereco_id')
                    ->where('cidade', 'ilike',   Session::get('cidade') );
            })
            ->get();

        return view("categoria.show")->with(['estabelecimentos' => $estabelecimentos,
                                                  'modalidadeS' => $id,
                                                  'pagina'      => $pagina ]);
    }

    public function search(Request $request) {
        $term = $request->pesquisa;
        $categorias = \App\Modalidade::whereRaw('unaccent(nome) ilike unaccent(\'%' . $term. '%\')')->select('id')->get();
        $usuarios = \App\User::whereRaw('unaccent(name) ilike unaccent(\'%' . $term. '%\') AND tipo like \'ESTABELECIMENTO\'')->select('id')->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("modalidade_id", $categorias)->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("iser_id", $usuarios)->get();

        $c = $request->session()->get('cidade');
       // DB::enableQueryLog();
        if(!Session::has('cidade'))
            Session::put('cidade', 'Garanhuns');
        $estabelecimentos = \App\Estabelecimento::
            whereIn("modalidade_id", $categorias)
            ->where('status', 'Aprovado')
            ->orWhereIn("user_id", $usuarios)
            ->where('status', 'Aprovado')
            ->join('enderecos', function ($join) {
                $join->on('enderecos.id', '=', 'estabelecimentos.endereco_id')
                ->where('cidade', 'ilike', Session::get('cidade'));
            })
            ->get();
        //dd(DB::getQueryLog());
        return view("categoria.show")->with(['estabelecimentos' => $estabelecimentos]);
    }
}

