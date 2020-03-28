@extends('layouts.app')

@section('content')
    @include('layouts.slideCategoria')

    <div class="col-md-12" style="padding-top: 2rem;padding-bottom: 0rem;">
        <label>{{$estabelecimentos->count()}} Resultado(s)</label>
    </div>

    <div class="container">
        <div class="row" style="padding-bottom: 3rem;">
            <div class="col-md-12 " >
                <div class="row" style="margin:1px;">
                   @foreach($estabelecimentos as $estabelecimento)
                        <button class="btn styleCategoriaButton" style="width: 318px;" data-toggle="modal" data-target="#modal{{$estabelecimento->id}}">
                            <div class="container">
                                <div class="row">
                                    <div style="padding: 0.5em; margin-top: 0.5rem;" class="col-md-2">
                                        @if(isset($estabelecimento->imagemCapa) && $estabelecimento->imagemCapa != "" )
                                            <img src="{{ asset('storage/imagens/' . $estabelecimento->imagemCapa) }}" width="65" height="65">
                                        @else
                                            <img src="{{ asset('icones/sem_imagem.png') }}"  width="65">
                                        @endif
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group styleCategoriaButton_container">
                                            <div class="styleCategoriaButton_titulo">{{ $estabelecimento->user->name }}</div>
                                            <div class="styleCategoriaButton_subtitulo">{{ mb_strimwidth($estabelecimento->endereco->rua . ", " . $estabelecimento->endereco->bairro, 0, 24, '...' ) }}</div>
                                            <div class="styleCategoriaButton_subtitulo">{{$estabelecimento->endereco->cidade}}-{{$estabelecimento->endereco->uf}}</div>
                                            <div class="styleCategoriaButton_subtitulo">@if($estabelecimento->telefones->count() > 0){{ $estabelecimento->telefones[0]->numero }}@endif</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </button>

                        <div class="modal fade" id="modal{{$estabelecimento->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <!-- <h5 class="modal-title" id="idTitulo">Quentinha da Dona Maria</h5> -->
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-3" style="height: 100px;">
                                                    @if(isset($estabelecimento->imagemCapa) && $estabelecimento->imagemCapa != "" )
                                                        <img src="{{ asset('storage/imagens/' . $estabelecimento->imagemCapa) }}"  width="120" height="120">
                                                    @else
                                                        <img src="{{ asset('icones/sem_imagem.png') }}" alt="torre" width="120px;">
                                                    @endif
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <output style="color: #2f306f; font-size: 19px">{{$estabelecimento->user->name}}</output>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <img src="{{asset('icones/local_logo_azul.svg')}}" width="19px;">
                                                                <output ><strong>Endereço</strong></output>
                                                            </div>
                                                            <div class="col-md-12">
                                                                {{$estabelecimento->endereco->rua }}, {{$estabelecimento->endereco->numero }}, {{$estabelecimento->endereco->bairro }},{{$estabelecimento->endereco->cidade}}-{{$estabelecimento->endereco->uf}}
                                                            </div>
                                                            <div class="col-md-12">
                                                                        @foreach($estabelecimento->telefones as $telefone)
                                                                            @if($telefone->zap)
                                                                                <img src="{{asset('icones/Icon awesome-whatsapp.svg')}}" width="19px;">
                                                                                <label>{{$telefone->numero}}</label>
                                                                                @break
                                                                            @endif
                                                                        @endforeach

                                                            </div>
                                                            <div class="col-md-12">
                                                                <img src="{{asset('icones/Icon awesome-calendar-alt.svg')}}" width="18px;">
                                                                <label>Horário de funcionamento</label>
                                                            </div>
                                                            <div class="col-md-12">
                                                                {{$estabelecimento->horarioFuncionamento}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label style="color: #2f306f; font-weight: bold;">Descrição:</label>
                                                    <div style="margin-left: 0.5rem;">
                                                        <p>{{$estabelecimento->descricao}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label style="color: #2f306f; font-weight: bold;">Contatos:</label>
                                                    <div>
                                                        <table class="table table-sm">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Telefone</th>
                                                                <th scope="col">Operadora</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($estabelecimento->telefones as $telefone)
                                                                <tr>
                                                                    @if($telefone->zap)
                                                                        <th scope="row"><img src="{{asset('icones/Icon awesome-whatsapp.svg')}}" width="19px;"></th>
                                                                    @else
                                                                        <th scope="row"></th>
                                                                    @endif

                                                                    <td>{{ $telefone->numero }}</td>
                                                                    <td>{{ $telefone->operadora }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <hr style="background-color: #2f306f; "> -->
                                            @if(null!==$estabelecimento->imagemInterna && $estabelecimento->imagemInterna!="")
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label style="color: #2f306f; font-weight: bold;">Produtos:</label>
                                                    <img src="{{asset('storage/imagens/' . $estabelecimento->imagemInterna)}}" width="440px" >
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-md-12">
                                                <label style="color: #2f306f; padding-top: 1rem; font-weight: bold;">Formas de Pagamento:</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if($estabelecimento->pagamentoDinheiro)
                                                            <img src="{{asset('icones/dinheiro_azul.png')}}" >
                                                        @else
                                                            <img src="{{asset('icones/dinheiro_cinza.png')}}" >
                                                        @endif
                                                        @if($estabelecimento->pagamentoTransferencia)
                                                            <img src="{{asset('icones/transferencia_azul.png')}}" >
                                                        @else
                                                            <img src="{{asset('icones/transferencia_cinza.png')}}" >
                                                        @endif
                                                        @if($estabelecimento->pagamentoDebito)
                                                            <img src="{{asset('icones/debito_azul.png')}}" >
                                                        @else
                                                            <img src="{{asset('icones/debito_cinza.png')}}" >
                                                        @endif
                                                        @if($estabelecimento->pagamentoCredito)
                                                            <img src="{{asset('icones/credito_azul.png')}}" >
                                                        @else
                                                            <img src="{{asset('icones/credito_cinza.png')}}" >
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <label style="color: #2f306f; padding-top: 1rem; font-weight: bold;">Redes Sociais:</label>
                                                <div class="row">
                                                    @if(null!==$estabelecimento->instagram && $estabelecimento->instagram != "")
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                                            <img src="{{asset('icones/instagram_logo_azul.svg')}}" width="20px;">
                                                            {{ $estabelecimento->instagram }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if(null!==$estabelecimento->facebook && $estabelecimento->facebook != "")
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                                            <img src="{{asset('icones/facebook_logo_azul.svg')}}" width="20px;">
                                                            {{ $estabelecimento->facebook }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if(null!==$estabelecimento->twitter && $estabelecimento->twitter != "")
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                                            <img src="{{asset('icones/@_logo_azul.svg')}}" width="20px;">
                                                            {{ $estabelecimento->twitter }}
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if(null!==$estabelecimento->site && $estabelecimento->site != "")
                                                        <div class="col-md-12">
                                                            <div style="padding-top: 0rem; padding-bottom: 0.2rem;">
                                                                <label style="color: #2f306f; font-size: 20px; margin-top: -2px; font-family: time; font-weight: bold;">W</label>
                                                                {{$estabelecimento->site}}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <!-- <img src="icones/instagram_logo.svg" width="40px;"><a href="">@ficaemcasa</a>
                                                    <img src="icones/facebook_logo.svg" width="40px;"><a href="">@ficaemcasa</a>
                                                    <img src="icones/a-lab.svg" width="90px;"><a href="">a</a>
                                                    <img src="icones/a-lab.svg" width="90px;"><a href="">a</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>




@endsection
