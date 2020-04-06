<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class AdminEstabelecimentoCreate extends Controller
{
    public function prepare() {
        $modalidades = \App\Modalidade::where('nome', '<>', 'null')->orderByRaw('unaccent(nome) asc')->get();
        return view("estabelecimento.create")->with([
            "modalidades" => $modalidades,
        ]);
    }

    //Metodo para criar o usuário AdminCidade
    public function saveAdminCidade(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if(count($validator->errors()) > 0){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $dadosUsuario = $request->only(["name", "email"]);
        $dadosUsuario['password'] = Hash::make($request['password']);
        $dadosUsuario['tipo'] = "ADMINCIDADE";
        $user = \App\User::create($dadosUsuario);

        return $user;
        // session()->flash('success', 'Estabelecimento cadastrado com sucesso');
        // return redirect()->route('estabelecimento.confirma');
    }

    public function save(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
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

        $dadosEndereco = $request->only(['cep', 'rua', 'numero', 'bairro', 'cidade', 'uf']);
        $endereco = \App\Endereco::create($dadosEndereco);

        $dadosUsuario = $request->only(["name", "email"]);
        $dadosUsuario['password'] = Hash::make($request['password']);
        $dadosUsuario['tipo'] = "ESTABELECIMENTO";
        $user = \App\User::create($dadosUsuario);

        $dadosEstabelecimento = $request->only(["descricao", "site", "pagamentoDinheiro", "pagamentoTransferencia",
            "pagamentoCredito", "pagamentoDebito", "instagram", "twitter", "facebook", "modalidade_id", "horarioFuncionamento"]);

        $dadosEstabelecimento['imagemCapa'] = $imagemCapa;
        $dadosEstabelecimento['imagemInterna'] = $imagemInterna;

        $dadosEstabelecimento['user_id'] = $user->id;
        $dadosEstabelecimento['endereco_id'] = $endereco->id;

        $estabelecimento = \App\Estabelecimento::create($dadosEstabelecimento);

        $telefones = $request['telefone'];
        $operadoras = $request['operadora'];
        $zaps = $request['zap'];

        $fones = array();
        for($i = 0; $i < count($telefones); $i++) {
            $fones[] = new \App\Telefone([
                'numero' => $telefones[$i],
                'operadora' => $operadoras[$i],
                'zap' => $zaps[$i],
            ]);
        }
        $estabelecimento->telefones()->saveMany($fones);

        session()->flash('success', 'Estabelecimento cadastrado com sucesso');
        return redirect()->route('estabelecimento.confirma');
    }

    public function pending(){
        $estabelecimentos = \App\Estabelecimento::where('status', 'Pendente')->orderBy('created_at', 'desc')->get();
        return view("estabelecimento.pending")->with([
            "estabelecimentos" => $estabelecimentos,
        ]);
    }

    public function pendingDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'estabelecimentoId' => 'required|integer',
        ]);
        $estabelecimento = \App\Estabelecimento::find($request->estabelecimentoId);
        return view("estabelecimento.pendingDetails")->with([
            "estabelecimento" => $estabelecimento,
        ]);
    }

    public function pendingJudge(Request $request){
        $validator = Validator::make($request->all(), [
            'estabelecimentoId' => 'required|integer',
            'decisao'           => 'required|string'
        ]);
        $estabelecimento = \App\Estabelecimento::find($request->estabelecimentoId);
        if($request->decisao == 'true'){
          $estabelecimento->status = "Aprovado";
          $estabelecimento->save();

          session()->flash('success', 'Estabelecimento aprovado com sucesso');
          return redirect()->route('estabelecimento.pending');
        }
        else{
          $estabelecimento->status = "Reprovado";
          $estabelecimento->save();

          session()->flash('success', 'Estabelecimento reprovado com sucesso');
          return redirect()->route('estabelecimento.pending');
        }
    }
}
