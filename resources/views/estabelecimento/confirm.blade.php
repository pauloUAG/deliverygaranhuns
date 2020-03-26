@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row titulo col-md-12">
            <h1><strong>Confirmação de Cadastro</strong></h1>
        </div>
        <div class="row subtitulo">
            <div class="col-sm-12">
                <p>A solicitação de cadastro de seu estabelecimento ou atividade foi realizado com sucesso!

Seus dados encontra-se em avaliação, e em poucos minutos, já constarão no site.
    </p>
                <p><a class="btn btn-primary botao-form" style="width: 10%;" href="{{route("inicio")}}">Clique aqui</a> para voltar à página inicial</p>
            </div>
        </div>

    </div>
@endsection
