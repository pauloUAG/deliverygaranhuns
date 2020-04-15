@extends('layouts.app')

@section('content')
    <!-- <div class="row">
        <div class="col-md-12">
            <h3>Categorias</h3>
        </div>
    </div> -->




<!--
    <div class="row" style="margin-top:20px">
        <div class="col-sm-12">
            <h3>Recomendações</h3>
        </div>
    </div> -->

    {{-- Destaques --}}
    <div class="row layout_index">
        <div class="col-sm-12" style="margin-bottom: -100px">
            <h1 class="title">Destaques</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 2rem;padding-bottom: 2rem;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="background-color: gray;">
                <div class="carousel-inner">
                    @if(count($imagem) > 0)
                        <div class="carousel-item active">
                            <img src="{{asset('storage/imagens/' . $imagem[0]->imagem)}}" class="d-block w-100"  alt="Primeiro Slide">
                        </div>
                        @for($i = 1 ; $i < count($imagem) ; $i++)
                            @if(isset($imagem[$i]->imagem) && $imagem[$i]->imagem!="")
                                <div class="carousel-item">
                                    <img src="{{asset('storage/imagens/' . $imagem[$i]->imagem)}}" class="d-block w-100"  alt="Primeiro Slide">
                                </div>
                            @endif
                        @endfor
                    @else
                        <div class="carousel-item active">
                            <img src="{{asset('slides/aviso_5.jpg')}}" class="d-block w-100" alt="Terceiro Slide" >
                        </div>  
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="left: -60px">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="right: -60px">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div>

    {{-- @include('layouts.slideCategoria') --}}


    {{-- É Gratuito --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-6">
            <h1 class="title">É Gratuito!</h1>
            <p class="paragraph">
                O Cadastro é completamente <strong>gratuito</strong> e passa
                por uma rápida avaliação, em que são verificados 
                os dados cadastrados, e em seguida, liberado
                para acesso ao público.
            </p>
        </div>

        <div class="col-sm-4">
            <img class="image" src="{{asset('icones/festa_icone.svg')}}" alt="">
        </div>
    </div>

    {{-- Aumente suas vendas --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-4">
            <img id="img-left" class="image" src="{{asset('icones/grafico_icone.svg')}}" alt="">
        </div>
        <div class="col-sm-6">
            <h1 class="title">Aumente suas vendas</h1>
            <p class="paragraph">
                O Cadastro é completamente <strong>gratuito</strong> e passa
                por uma rápida avaliação, em que são verificados 
                os dados cadastrados, e em seguida, liberado
                para acesso ao público.
            </p>
        </div>

        <div id="img-right" class="col-sm-4">
            <img class="image" src="{{asset('icones/grafico_icone.svg')}}" alt="">
        </div>
    </div>

    {{-- Categorias --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-6">
            <h1 class="title">Categorias</h1>
            <p class="paragraph">
                Nossa lista de categorias vem sendo atualizada
                de acordo com a necessidade. Caso queira sugerir alguma
                categoria é só entrar em contato por e-mail ou através das
                nossas redes sociais
            </p>
            <div class="row justify-content-center">
                <a href="#" class="btn btn-index btn-lg">
                    Ver todas as Categorias
                </a>
            </div>
        </div>

        <div class="col-sm-4">
            <img class="image" src="{{asset('icones/festa_icone.svg')}}" alt="">
        </div>
    </div>

    {{-- Que tal cadastrar o seu negócio? --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-4">
            <img id="img-left" class="image" src="{{asset('icones/cadastrar_negocio_icone.svg')}}" alt="">
        </div>
        <div class="col-sm-6">
            <h1 class="title">Que tal cadastrar o seu negócio?</h1>
            <p class="paragraph">
                O Cadastro é completamente <strong>gratuito</strong> e passa
                por uma rápida avaliação, em que são verificados 
                os dados cadastrados, e em seguida, liberado
                para acesso ao público.
            </p>
            <div class="row justify-content-center">
                <a href="#" class="btn btn-index btn-lg">
                    Cadastre-se
                </a>
            </div>
        </div>

        <div id="img-right" class="col-sm-4">
            <img class="image" src="{{asset('icones/cadastrar_negocio_icone.svg')}}" alt="">
        </div>
        
    </div>

    {{-- Contato --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-6">
            <h1 class="title">Contato</h1>
            <p class="paragraph">
                Se você tiver alguma dúvida e/ou sugestão
                é só enviar uma mensagem.
            </p>
            <img class="image" src="{{asset('icones/rede_social_icone_.svg')}}" alt="">
        </div>

        <div class="col-sm-6">
            <div id="card-contato" class="card">
                <div class="card-body">
                    <form action="">
                        @csrf
        
                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="email">Menssagem</label>
                                    <textarea name="menssagem" style="width:100%" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
