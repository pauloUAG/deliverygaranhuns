<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaListController extends Controller
{
    public function all() {
        $modalidades = \App\Modalidade::where('nome', '<>', 'null')->orderBy('nome', 'asc')->get();

        return view("categoria.list")->with(['modalidades' => $modalidades]);

    }
}
