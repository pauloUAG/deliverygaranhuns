@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="row titulo col-md-12">
        <h1>Adicionar imagens</h1>
    </div>

    <div class="col-md-12">
        <form id="formCadastro" method="POST" enctype="multipart/form-data" action="{{ route('carrossel.imagens') }}">
            @csrf

            <div class="row" style="margin-top:20px">
                <div class="col-md-12">
                    <div id="imagens">
                        <div class='row align-items-end' >
                            <div class="col-md-3">
                                <label class="col-form-label" for="imagem">Inserir Imagem (jpg ou png)</label>
                                <input type="file" class="form-control-file" id="imagem" name="imagem" required placeholder="Selecione um arquivo" />
            
                                @error('imagem')
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0" style="margin: 20px 0 20px 0">
                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="row titulo col-md-12">
        <h1>Excluir imagens</h1>
    </div>

    <div class="col-md-12">
        <div class="col-md-3">
            @for($i = 0 ; $i < count($imagem) ; $i++)
                <label class="col-form-label" for="imagem">Imagem de Carrossel</label>
                @if(isset($imagem[$i]->imagem) && $imagem[$i]->imagem!="")
                  <img src="{{asset('storage/imagens/' . $imagem[$i]->imagem)}}" alt="...">
                @else
                  Sem imagem
                @endif
                <form method="get" action="{{route('carrossel.apagar', ["id" => $imagem[$i]->id])}}">
                    <button type="submit" class="btn btn-danger">Apagar Imagem</button>
                </form>
        
                @error('imagem')
                <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            @endfor
    
        </div>
    </div>
</div>
@endsection