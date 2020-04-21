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
        <div class="col-sm-12" style="margin-bottom: -100px; margin-top:-3.5rem;">
            <h1 class="title">Destaques</h1>
        </div>
    </div>
    <div class="row justify-content-center" style="margin-top:-1.5rem;">
        <div class="col-md-11">
          <div class="row justify-content-center">

            <!-- Botao voltar -->
            <div class="col">
              <img class="carousel-control-prev" id="carrousel_botao_voltar" href="#carouselExampleControls" role="button" data-slide="prev" src="{{asset('icones/voltar_azul_icone.svg')}}" alt="">
              <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="left: -60px">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Anterior</span>
              </a> -->
            </div>
            <!--x Botao voltar x-->

            <!-- Slideshow -->
            <div class="col-sm-11">
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
                 </div>
            </div>
            <!--x Slideshow x-->

            <!-- Botao proximo -->
            <div class="col">
              <img class="carousel-control-next" id="carrousel_botao_proximo" href="#carouselExampleControls" role="button" data-slide="next" src="{{asset('icones/proximo_azul_icone.svg')}}" alt="">
              <!-- <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="right: -60px">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Próximo</span>
              </a> -->
            </div>
            <!--x Botao proximo x-->
          </div>

        </div>
    </div>

    {{-- @include('layouts.slideCategoria') --}}


    {{-- É Gratuito --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-6">
            <h1 class="title">É gratuito!</h1>
            <p class="paragraph">
                O Cadastro é completamente <strong>gratuito</strong> e passa
                por uma rápida avaliação, em que são verificados
                os dados cadastrados, e em seguida, liberado
                para acesso ao público.
            </p>
        </div>

        <div class="col-sm-6">
            <img class="image" id="img-gratuito" src="{{asset('icones/gratuito_icone.svg')}}" alt="">
        </div>
    </div>

    {{-- Aumente suas vendas --}}
    <div class="row layout_index d-flex justify-content-between">
        <div class="col-sm-6">
            <img id="img-aumenteSuasVendas" class="image" src="{{asset('icones/grafico_icone.svg')}}" alt="">
        </div>
        <div class="col-sm-6">
            <h1 class="title">Aumente suas vendas ou prestação de serviço</h1>
            <p class="paragraph">
                Disponibilizar informações sobre seu estabelecimento ou prestação de serviço
                nesta plataforma ampliam as possibilidades de serem localizados em buscas
                realizadas na internet ou de que consumidores, por meio de seu cadastro,
                lhes contactem para a compra de produtos ou contratação de serviços.
            </p>
        </div>

        <div id="img-right" class="col-sm-4">
            <img class="image" id="img-aumenteSuasVendas2" src="{{asset('icones/grafico_icone.svg')}}" alt="">
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
                <a href="{{route('categoria.list')}}" class="btn btn-index btn-lg">
                    Ver todas as Categorias
                </a>
            </div>
        </div>

        <div class="col-sm-6">
            <img class="image" id="img_categoria" src="{{asset('icones/categorias_icone.png')}}" alt="">
        </div>
    </div>

    {{-- Que tal cadastrar o seu negócio? --}}
    <div class="row layout_index d-flex justify-content-between" style="padding-bottom:5rem;">
        <div class="col-sm-4">
            <img id="img-cadastrarLeft" class="image" src="{{asset('icones/cadastrar_negocio_icone.svg')}}" alt="">
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
                <a href="{{route('estabelecimento.create')}}" class="btn btn-index btn-lg">
                    Cadastre-se
                </a>
            </div>
        </div>

        <div id="img-right" class="col-sm-4">
            <img class="image" id="img_cadastrar" src="{{asset('icones/cadastrar_negocio_icone.svg')}}" alt="">
        </div>

    </div>

@endsection
