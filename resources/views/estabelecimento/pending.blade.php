@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <label>Estabelecimentos pendentes</label>
        </div>
        <div class="col-md-12">
            <div class="container">
                <div class="row justify-content-left">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Detalhes</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($estabelecimentos as $estabelecimento)
                      <tr>
                        <th scope="row">{{$estabelecimento->id}}</th>
                        <td>{{$estabelecimento->user->name}}</td>
                        <td><a href="{{route('estabelecimento.pending.details', ['estabelecimentoId' => $estabelecimento->id])}}">Detalhes</a>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>



@endsection
