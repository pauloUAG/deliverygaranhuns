<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Auth;

class AdminMunicipioController extends Controller
{
    public function termos() {
        return view("admin.termosprivacidade");
    }
    public function index() {
        $municipios = \App\Cidade::all();
        return view('municipio.admin')->with(['municipios' => $municipios]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255|min:3|unique:cidades',
            'uf' => 'required|string|max:2|min:2'
        ]);

        if(count($validator->errors()) > 0){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        \App\Cidade::create($request->only(['nome','uf']));
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

    //Metodo para listagem de estabelecimentos por cidade do Admin
    
    public function listEst() {
        // $user = \App\User::find($id);
        //$estabelecimentos = \App\Estabelecimento::whereIn("modalidade_id", $categorias)->get();
        //$estabelecimentos = \App\Estabelecimento::whereIn("iser_id", $usuarios)->get();
        $admin = \App\Admin::where('user_id', Auth::user()->id)->get();

        $lista = \App\Estabelecimento::
            where('status', 'Pendente')->get();
        
        $estabelecimentos = array();
        foreach($lista as $estabelecimento) {
            if($estabelecimento->endereco->cidade == $admin[0]->cidade->nome) {
                $estabelecimentos[] = $estabelecimento;
            }
        }
        // return dd($estabelecimentos);
        return view("estabelecimento.pending")->with(['estabelecimentos' => $estabelecimentos]);
    }

    public function prepareAdmin() {
        $cidades = \App\Cidade::where('nome', '<>', 'null')->orderByRaw('unaccent(nome) asc')->get();
        return view("admin.cadastroAdmin")->with([
            "cidades" => $cidades,
        ]);
    }

    public function cadastroPaginaCidade() {
        return view("admin.cadastroCidade");
    }

    public function carrosselPagina() {
        $imagens = \App\Carrossel::all();
        // dd($imagens);
        return view("admin.editarCarrossel")->with(["imagem" => $imagens]);
    }

    public function carrossel(Request $request) {
        
        $imagem = "";
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $ext = strtolower(request()->imagem->getClientOriginalExtension());

            if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
                $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
            else {
                $imagem = 'c' . time() . '.' . $ext;
                $thumbPath = storage_path('app/public/imagens/'.$imagem);
                Image::configure(array('driver' => 'imagick'));
                $image = Image::make(request()->imagem->path());
                $image->fit(960, 349)->save($thumbPath);
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

        $dadosImagem['imagem'] = $imagem;

        $carrossel = \App\Carrossel::create($dadosImagem);
        
        session()->flash('success', 'Imagem cadastrada!');
        return redirect()->route('carrossel.pagina');
    }

    public function cadastrarCidade(Request $request) {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        if(count($validator->errors()) > 0){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $dadosCidade = $request->only(['nome', 'uf']);
        $cidade = \App\Cidade::create($dadosCidade);

        session()->flash('success', 'Cadastrado');
        return redirect()->route('cadastro.PaginaCidade');
    }

    public function carrosselApagar($id) {

        $imagem = \App\Carrossel::find($id);
        if(isset($imagem)) {
            $nome_da_imagem = $imagem->imagem;
            Storage::disk('public')->delete($nome_da_imagem);
            $imagem->delete(); 
        }
        session()->flash('success', 'Imagem apagada!');
        return redirect()->route('carrossel.pagina');
    }
}
