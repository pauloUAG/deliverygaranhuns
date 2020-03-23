@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row titulo col-md-12">
            <h1>Confirmação de Cadastro</h1>
        </div>
        <div class="row subtitulo">
            <div class="col-sm-12">
                <p>Seus dados foram recebidos com sucesso e em breve aparecerão na nossa listagem.</p>
                <p><a href="{{route("inicio")}}">Clique aqui</a> para voltar à página inicial</p>
            </div>
        </div>

    </div>
@endsection
