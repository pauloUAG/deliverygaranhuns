@extends('layouts.app')

@section('content')
    <?php
    $total = count($modalidades);
    $slides = intdiv($total, 5);
    ?>

    <div class="row">
        <div class="col-md-12">
            <h3>Inserir Novas Categorias</h3>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Categoria cadastrada com sucesso!</strong>
        </div>
    @endif
    <form id="formCadastro" method="POST" enctype="multipart/form-data" action="{{ route('cadastrar.modalidades') }}">
        @csrf

        <div class="row">
            <div class="col-md-4">
                <label for="nome" class="col-form-label">Nome:</label>
                <input class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" id="nome" required />
                @error('nome')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
        </div>

        <div class="row" style="margin-top:30px">
            <div class="col-md-12">
                <div id="icone">
                    <div class='row align-items-end' >
                        <div class="col-md-3">
                            <label class="col-form-label" for="icone">Inserir Imagem (Formato .svg não suportado!):</label>
                            <input type="file" class="form-control-file" id="icone" name="icone" required placeholder="Selecione um arquivo" />
        
                            @error('icone')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row" style="margin-top: 20px">
            
            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Cadastrar') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-md-12">
            <h3>Categorias</h3>
        </div>
    </div>
    {{-- Trecho abaixo reutilizado --}}
    <div class="row justify-content-center">
        <?php $pagina=0; $contador=-1; ?>
        @foreach($modalidades as $modalidade)
            <?php $contador ++; $pagina=($contador%5==0&&$contador>0)?$pagina+1:$pagina; ?>
            <div class="styleCategoria_button_padding">
                <a class="btn styleCategoria_button" style="display: block; line-height: 110px;">
                    <span style="line-height: normal; display: inline-block; vertical-align: middle;">
                    <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleCategoria_imagem">
                                <img src="{{ asset('/icones/' . $modalidade->icone ) }}" alt="{{ $modalidade->nome }}" width="35px;">
                            </div>
                            <div class="col-sm-12">
                                <label>{{ $modalidade->nome }}</label>
                            </div>
                        </div>
                    </div>
                    </span>
                </a>
            </div>
        @endforeach
    </div>



@endsection
