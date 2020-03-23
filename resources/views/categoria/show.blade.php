@extends('layouts.app')

@section('content')
    @include('layouts.slideCategoria')

    <div class="col-md-12" style="padding-top: 2rem;padding-bottom: 0rem;">
        <label>Resultado</label>
    </div>
    <div class="container">
        <div class="row" style="padding-bottom: 3rem;">
            <div class="col-md-12 " >
                <div class="row" style="margin:1px;">
                   @foreach($estabelecimentos as $estabelecimento)

                        <button class="btn styleCategoriaButton" style="width: 318px;" data-toggle="modal" data-target="#modal{{$estabelecimento->id}}">
                            <div class="container">
                                <div class="row">
                                    <div style="padding: 0.5em; margin-top: 0.5rem;">
                                        @if(isset($estabelecimento->imagemCapa) && $estabelecimento->imagemCapa != "" )
                                            <img src="{{ asset('storage/imagens/' . $estabelecimento->imagemCapa) }}" alt="torre" width="65px;">
                                        @else
                                            <img src="{{ asset('icones/sem_imagem.png') }}" alt="torre" width="65px;">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="form-group styleCategoriaButton_container">
                                            <div class="styleCategoriaButton_titulo">{{ $estabelecimento->user->name }}</div>
                                            <div class="styleCategoriaButton_subtitulo">{{ $estabelecimento->endereco->rua }}, {{ $estabelecimento->endereco->bairro }}</div>
                                            <div class="styleCategoriaButton_subtitulo">{{ $estabelecimento->telefones[0]->numero }}</div>
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
                                                    <img src="{{asset('icones/a-lab.svg')}}" width="90px;">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <output style="color: #2f306f; font-size: 19px">Quentinha da Dona Maria</output>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <img src="{{asset('icones/local_logo_azul.svg')}}" width="19px;">
                                                                <output >Endereço</output>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <img src="{{asset('icones/Icon awesome-whatsapp.svg')}}" width="19px;">
                                                                        <label>(81)99172-3212</label>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <img src="{{asset('icones/Icon awesome-phone-alt.svg')}}" width="19px;">
                                                                        <label>(81)99172-3212</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <img src="{{asset('icones/Icon awesome-calendar-alt.svg')}}" width="18px;">
                                                                <label>Horário de funcionamento</label>
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
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Fica em casa!!!!"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style="background-color: #2f306f; ">
                                            <label style="color: #2f306f; padding-top: 1rem; font-weight: bold;">Outros Contatos:</label>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                                            <img src="{{asset('icones/instagram_logo_azul.svg')}}" width="20px;">
                                                            <a href="">@ficaemcasa</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                                            <img src="{{asset('icones/facebook_logo_azul.svg')}}" width="20px;">
                                                            <a href="">@ficaemcasa</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0.2rem; padding-bottom: 0.2rem;">
                                                            <img src="{{asset('icones/@_logo_azul.svg')}}" width="20px;">
                                                            <a href="">@ficaemcasa</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div style="padding-top: 0rem; padding-bottom: 0.2rem;">
                                                            <label style="color: #2f306f; font-size: 20px; margin-top: -2px; font-family: time; font-weight: bold;">W</label>
                                                            <a href="">www.quentinhadamaria.com.br</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>




@endsection
