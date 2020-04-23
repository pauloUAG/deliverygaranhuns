<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
    $imagens = \App\Carrossel::all();
    return view('welcome')->with(["imagem" => $imagens]);
})->name("inicio");

Route::get('/home', "HomeController@index")->name("home");

Route::get("/estabelecimento/cadastro", "AdminEstabelecimentoCreate@prepare")->name("estabelecimento.create");
Route::post("/estabelecimento/cadastro", "AdminEstabelecimentoCreate@save")->name("estabelecimento.save");
Route::get("/estabelecimento/confirma", function () {
    return view('estabelecimento.confirm');
})->name("estabelecimento.confirma");

Route::post("/alterar/municipio", "CidadeController@set")->name("alterar.municipio");
Route::get("/categorias/list", "CategoriaListController@all")->name("categoria.list");
Route::get("/categorias/show/{pagina}/{id}", "CategoriaShowController@show")->name("categoria.show");
Route::post("/estabelecimentos/busca", "CategoriaShowController@search")->name("estabelecimento.busca");
Route::get("/termosprivacidade/", "AdminMunicipioController@termos")->name("termos.privacidade");

Route::middleware(['auth'])->group(function(){
    
    //Rotas para o admin de cidade
    
    Route::get("/admin/estabelecimentoAdmin/pending/details", "AdminEstabelecimentoCreate@pendingAdminDetails")->name("estabelecimentoAdmin.pending.details");
    Route::post("/admin/estabelecimentoAdmin/pending/judge", "AdminEstabelecimentoCreate@pendingAdminJudge")->name("estabelecimentoAdmin.pending.judge");
    Route::get("/admin/estabelecimentoAdmin/", "AdminEstabelecimentoCreate@pending")->name("estabelecimentoAdmin.pending");
    Route::get("/admin/estabelecimentos/", "AdminMunicipioController@listEst")->name("estabelecimento.listUser");
    Route::get("/admin/estabelecimentoAdmin/", "AdminMunicipioController@revisarAdmin")->name("estabelecimentoAdmin.revisar");
    
    //editar estabelecimento
    Route::get("/estabelecimento/editar", "EstabelecimentoController@edit")->name("estabelecimento.edit");
    Route::post("/estabelecimento/editar", "EstabelecimentoController@store")->name("estabelecimento.edit");
    
});

// Pendentes e julgar pendentes
Route::middleware('can:autorizarCadastro,App\Estabelecimento')->group(function () {
    Route::get("/admin/home/", "AdminEstabelecimentoCreate@pending")->name("estabelecimento.pending");
    Route::get("/admin/estabelecimento/pending/details", "AdminEstabelecimentoCreate@pendingDetails")->name("estabelecimento.pending.details");
    Route::post("/admin/estabelecimento/pending/judge", "AdminEstabelecimentoCreate@pendingJudge")->name("estabelecimento.pending.judge");
    Route::get('/admin/municipios', "AdminMunicipioController@index")->name("admin.municipios");
    Route::post('/admin/municipios/create', "AdminMunicipioController@create")->name("admin.municipios.create");
    Route::get('/admin/municipios/remove/{id}', "AdminMunicipioController@remove")->name("admin.municipios.remove");
    Route::get("/admin/carrossel", "AdminMunicipioController@carrosselPagina")->name("carrossel.pagina");
    Route::post("/admin/carrossel", "AdminMunicipioController@carrossel")->name("carrossel.imagens");
    Route::delete("/admin/carrossel/imagens/{id}", "AdminMunicipioController@carrosselApagar")->name("carrossel.apagar");
    Route::get("/admin/cadastro/", "AdminMunicipioController@prepareAdmin")->name("cadastro.adminCidade");
    Route::post("/admin/estabelecimentos/", "AdminEstabelecimentoCreate@saveAdminCidade")->name("admin.adminCreate");
    Route::get("/admin/modalidades/", "AdminMunicipioController@createPage")->name("cadastrar.modalidades");
    Route::post("/admin/modalidades/", "AdminMunicipioController@createModalidade")->name("cadastrar.modalidades");
    Route::get("/admin/estabelecimento/", "AdminMunicipioController@revisar")->name("estabelecimento.revisar");
});

Auth::routes();
