<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
}
