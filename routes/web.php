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


Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');
