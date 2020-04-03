<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("inicio");

Route::get("/estabelecimento/cadastro", "AdminEstabelecimentoCreate@prepare")->name("estabelecimento.create");
Route::post("/estabelecimento/cadastro", "AdminEstabelecimentoCreate@save")->name("estabelecimento.save");
Route::get("/estabelecimento/confirma", function () {
    return view('estabelecimento.confirm');
})->name("estabelecimento.confirma");

Route::post("/alterar/municipio", "CidadeController@set")->name("alterar.municipio");
Route::get("/categorias/list", "CategoriaListController@all")->name("categoria.list");
Route::get("/categorias/show/{pagina}/{id}", "CategoriaShowController@show")->name("categoria.show");
Route::post("/estabelecimentos/busca", "CategoriaShowController@search")->name("estabelecimento.busca");

Route::get("/admin/estabelecimentos", "CategoriaListUserController@listUser")->name("estabelecimento.listUser");
Route::get('/admin/municipios', "AdminMunicipioController@index")->name("admin.municipios");
Route::post('/admin/municipios/create', "AdminMunicipioController@create")->name("admin.municipios.create");
Route::get('/admin/municipios/remove/{id}', "AdminMunicipioController@remove")->name("admin.municipios.remove");

// Pendentes e julgar pendentes
Route::middleware('can:autorizarCadastro,App\Estabelecimento')->group(function () {

    Route::get("/home", "AdminEstabelecimentoCreate@pending")->name("estabelecimento.pending");
    Route::get("/admin/estabelecimento/pending/details", "AdminEstabelecimentoCreate@pendingDetails")->name("estabelecimento.pending.details");
    Route::post("/admin/estabelecimento/pending/judge", "AdminEstabelecimentoCreate@pendingJudge")->name("estabelecimento.pending.judge");
});


Auth::routes();
