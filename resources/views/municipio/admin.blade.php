@extends('layouts.app')

@section('content')
    @if ($message = Session::get('errors'))
        <div class="alert alert-danger alert-block fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>ERRO NO CADASTRO!</strong> Corrija as informações marcadas abaixo e tente novamente.
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Município cadastrado com sucesso!</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 subtitulo">
            <label>Municípios Cadastrados </label>
        </div>
        <div class="col-md-12">
            <div class="container">
                <div class="row justify-content-left">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($municipios as $municipio)
                            <tr>
                                <th scope="row">{{$municipio->id}}</th>
                                <td>{{$municipio->nome}}</td>
                                <td><a href="{{route('admin.municipios.remove', ['id'=>$municipio->id])}}" >Remover</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 subtitulo">
            <label>Adicionar Município</label>
        </div>
    </div>
    <form action="{{route('admin.municipios.create')}}" method="POST">
        @csrf
    <div class="row">

            <div class="col-md-8">
                <label for="nome" class="col-form-label">Nome</label>
                <input class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" id="nome" required />
                @error('nome')
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="modalidade_id" class="col-form-label">&nbsp;</label>
                <button type="submit" class="btn btn-primary" style="width:100%">
                    Concluir Cadastro
                </button>
            </div>

    </div>
    </form>

@endsection
