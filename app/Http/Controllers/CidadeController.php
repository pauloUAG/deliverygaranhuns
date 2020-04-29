<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function set(Request $request) {
        // dd($request->rota_nome);
        $parametros = $request->rota_parametros;
        dd($parametros);
        $municipio = $request->all()['cidade'];
        $request->session()->put('cidade', $municipio);
        if($request->rota_nome == 'categoria.show'){
          return redirect(route($request->rota_nome,["pagina" => $parametros["pagina"], "id" => $parametros["id"]]));
        }
        elseif($request->rota_nome == 'categoria.list'){
          return redirect(route($request->rota_nome));
        }
        elseif($request->rota_nome == 'estabelecimento.busca'){
          return redirect(route($request->rota_nome));
        }
        return redirect(route('inicio'));
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
