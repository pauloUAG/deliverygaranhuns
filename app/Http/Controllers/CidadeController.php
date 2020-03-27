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
}
