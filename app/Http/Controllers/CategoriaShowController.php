<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaShowController extends Controller
{
    public function show($pagina,$id) {
        // dd($pagina);
        $estabelecimentos = \App\Estabelecimento::where([["modalidade_id", $id],['status', 'Aprovado']])->get();
        $modalidades = \App\Modalidade::all();
        return view("categoria.show")->with(['estabelecimentos' => $estabelecimentos,
                                                  'modalidades' => $modalidades,
                                                  'modalidadeS' => $id,
                                                  'pagina'      => $pagina ]);

    }

    public function search(Request $request) {
        $modalidades = \App\Modalidade::all();
        $term = $request->pesquisa;
        $categorias = \App\Modalidade::where('nome', 'ilike', '%' . $term. '%')->select('id')->get();
        $usuarios = \App\User::where([['name', 'ilike', '%' . $term. '%'],['tipo', 'ESTABELECIMENTO']])->select('id')->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("modalidade_id", $categorias)->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("iser_id", $usuarios)->get();

        $estabelecimentos = \App\Estabelecimento::whereIn("modalidade_id", $categorias)->orWhereIn("user_id", $usuarios)->where('status', 'Aprovado')->get();
        return view("categoria.show")->with(['estabelecimentos' => $estabelecimentos,
                                                   'modalidades' => $modalidades]);
    }
}

