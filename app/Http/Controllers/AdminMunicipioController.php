<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminMunicipioController extends Controller
{
    public function index() {
        $municipios = \App\Cidade::all();
        return view('municipio.admin')->with(['municipios' => $municipios]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255|min:3|unique:cidades',
        ]);

        if(count($validator->errors()) > 0){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        \App\Cidade::create($request->only(['nome']));
        return redirect(route("admin.municipios"))->withSuccess(['message' => "Registro Cadastrado com sucesso"]);

    }

    public function remove($id) {
        $c = \App\Cidade::find($id);
        if($c != null) {
            $c->delete();
            return redirect(route("admin.municipios"))->withSuccess(['message' => "Registro Removido com sucesso"]);
        } else {
            return redirect(route("admin.municipios"))->withErrors(['message' => "Nã nã nã "]);
        }

    }

    //Metodo para listagem de estabelecimentos por cidade do Admin
    
    public function listEst($id) {
        // $user = \App\User::find($id);
        //$estabelecimentos = \App\Estabelecimento::whereIn("modalidade_id", $categorias)->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("iser_id", $usuarios)->get();
        $admin = \App\Admin::where('user_id', $id)->get();
        // $cidade = (Session::has('cidade'))?Session::get('cidade'):'Garanhuns';
        $lista = \App\Estabelecimento::
            where('status', 'Pendente')->get();
        
        $estabelecimentos = array();
        foreach($lista as $estabelecimento) {
            if($estabelecimento->endereco->cidade == $admin[0]->cidade->nome) {
                $estabelecimentos[] = $estabelecimento;
            }
        }
        // return dd($estabelecimentos);
        return view("estabelecimento.pending")->with(['estabelecimentos' => $estabelecimentos]);
    }

    public function prepareAdmin() {
        $cidades = \App\Cidade::where('nome', '<>', 'null')->orderByRaw('unaccent(nome) asc')->get();
        return view("admin.cadastroAdmin")->with([
            "cidades" => $cidades,
        ]);
    }

    public function cadastroPaginaCidade() {
        return view("admin.cadastroCidade");
    }

    public function cadastrarCidade(Request $request) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        if(count($validator->errors()) > 0){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $dadosCidade = $request->only(['nome', 'uf']);
        $cidade = \App\Cidade::create($dadosCidade);

        return $cidade; 
    }
}
