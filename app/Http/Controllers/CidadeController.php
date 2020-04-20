<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function set(Request $request) {
        $municipio = $request->all()['cidade'];
        $request->session()->put('cidade', $municipio);
        return redirect(route("inicio"));
    }

    public function getCategoriasEstabelecimentosPorCidade(Request $request){
        $categorias = \App\Modalidade::all();
        //colocar where cidade = cidade;
        $enderecosId = \App\Endereco::where('cidade', $request->cidade)->select('id')->get();
        $estabelecimentos = \App\Estabelecimento::whereIn('endereco_id', $enderecosId)->where('status', 'Aprovado')->get();
        $response = [];
        foreach ($categorias as $key) {
          array_push($response, $key->nome);
        }
        foreach ($estabelecimentos as $key) {
          array_push($response, $key->user->name);
        }
        return response()->json($response, 200);
    }
}
