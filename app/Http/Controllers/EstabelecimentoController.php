<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class EstabelecimentoController extends Controller
{
    public function edit(){
      $estabelecimento = \App\Estabelecimento::where('user_id', Auth::user()->id)->first();
      return view("estabelecimento.edit")->with([
          "estabelecimento" => $estabelecimento,
      ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cep' => 'required|min:8|max:9'
        ]);

        $imagemCapa = "";
        if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
            $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());
            if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
                $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
            else {
                $imagemCapa = 'c' . time() . '.' . $ext;
                $thumbPath = storage_path('app/public/imagens/'.$imagemCapa);
                Image::configure(array('driver' => 'imagick'));
                $image = Image::make(request()->imagemCapa->path());
                $image->fit(120, 120)->save($thumbPath);
                /*if($image->width() > $image->height()) {
                    $image->resize(120, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbPath);
                } else {
                    $image->resize(null, 120, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($thumbPath);
                }*/
            }
        }

        $imagemInterna = "";
        if($request->hasFile('imagemInterna') && $request->file('imagemInterna')->isValid()) {
            $ext = strtolower(request()->imagemInterna->getClientOriginalExtension());
            if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
                $validator->errors()->add("imageminterna", "Formato de imagem inválido, utilize imagem jpg ou png");
            else {

                $imagemInterna = 'i' . time() . '.' . $ext;
                $imagePath = storage_path('app/public/imagens/'.$imagemInterna);
                Image::configure(array('driver' => 'imagick'));
                Image::make(request()->imagemInterna->path())->resize(440, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($imagePath);
                //$upload = $request->imagemInterna->storeAs('imagens', $imagemInterna);
            }
        }

        if(count($validator->errors()) > 0){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $estabelecimento = \App\Estabelecimento::where('user_id', Auth::user()->id)->first();
        $endereco = $estabelecimento->endereco;

        $endereco->cep = $request->cep;
        $endereco->rua = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->uf = $request->uf;

        $dadosEstabelecimento = $request->only(["descricao", "site",
            "pagamentoDinheiro", "pagamentoTransferencia",
            "pagamentoCredito", "pagamentoDebito", "instagram", "twitter", "facebook",
            "modalidade_id", "horarioFuncionamento", "cnpj"]);

        if($imagemCapa != ""){
          $estabelecimento->imagemCapa = $imagemCapa;
        }
        if($imagemInterna != ""){
          $estabelecimento->imagemInterna = $imagemInterna;
        }


        $estabelecimento->descricao = $request->descricao;
        $estabelecimento->site = $request->site;
        if($request->pagamentoDinheiro == null){
          $estabelecimento->pagamentoDinheiro = false;
        }
        else{
          $estabelecimento->pagamentoDinheiro = $request->pagamentoDinheiro;
        }
        if($request->pagamentoTransferencia == null){
          $estabelecimento->pagamentoTransferencia = false;
        }
        else{
          $estabelecimento->pagamentoTransferencia = $request->pagamentoTransferencia;
        }
        if($request->pagamentoCredito == null){
          $estabelecimento->pagamentoCredito = false;
        }
        else{
          $estabelecimento->pagamentoCredito = $request->pagamentoCredito;
        }
        if($request->pagamentoDebito == null){
          $estabelecimento->pagamentoDebito = false;
        }
        else{
          $estabelecimento->pagamentoDebito = $request->pagamentoDebito;
        }
        $estabelecimento->instagram = $request->instagram;
        $estabelecimento->twitter = $request->twitter;
        $estabelecimento->facebook = $request->facebook;
        $estabelecimento->modalidade_id = $request->modalidade_id;
        $estabelecimento->horarioFuncionamento = $request->horarioFuncionamento;
        $estabelecimento->cnpj = $request->cnpj;
        $estabelecimento->save();

        $user = \App\User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->save();
        
        $telefones = $request['telefone'];
        $operadoras = $request['operadora'];
        $zaps = $request['zap'];

        $fones = array();
        $cadastrados = $estabelecimento->telefones;

        for($i = 0; $i < count($telefones); $i++) {
            if($i < count($cadastrados)){
              
              $cadastrados[$i]->numero = $telefones[$i];
              $cadastrados[$i]->operadora = $operadoras[$i];
              $cadastrados[$i]->zap = $zaps[$i];
            }
            else{
              
              $fones[] = new \App\Telefone([
                'numero' => $telefones[$i],
                'operadora' => $operadoras[$i],
                'zap' => $zaps[$i],
              ]);

            }
        }

        $estabelecimento->telefones()->saveMany($fones);

        session()->flash('success', 'Estabelecimento editado com sucesso');
        return redirect()->route('home');
    }
}
