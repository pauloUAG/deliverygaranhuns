<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaListController extends Controller
{
    public function all() {
        return view("categoria.list");
    }
}
