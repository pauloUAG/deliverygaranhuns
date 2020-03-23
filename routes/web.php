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
});

Route::get("/admin/estabelecimento/create", "AdminEstabelecimentoCreate@prepare")->name("estabelecimento.create");
Route::post("/admin/estabelecimento/save", "AdminEstabelecimentoCreate@save")->name("estabelecimento.save");

Route::get("/categorias/list", "CategoriaListController@all")->name("categoria.list");

Route::get("/categorias/show/{id}", "CategoriaShowController@show")->name("categoria.show");
Route::post("/estabelecimentos/busca", "CategoriaShowController@search")->name("estabelecimento.busca");

// Pendentes e julgar pendentes
Route::get("/admin/estabelecimento/pending", "AdminEstabelecimentoCreate@pending")->name("estabelecimento.pending");
Route::get("/admin/estabelecimento/pending/details", "AdminEstabelecimentoCreate@pendingDetails")->name("estabelecimento.pending.details");
Route::post("/admin/estabelecimento/pending/judge", "AdminEstabelecimentoCreate@pendingJudge")->name("estabelecimento.pending.judge");

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
