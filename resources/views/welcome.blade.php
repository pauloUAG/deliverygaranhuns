@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Categorias</h3>
        </div>
    </div>

    @include('layouts.slideCategoria')

    <div class="row" align="center">
        <div class="col-sm-12">
            <a href="{{route('categoria.list')}}" class="btn btn-outline-dark">Ver todas as categorias</a>
        </div>
    </div>

    <div class="row" style="margin-top:20px">
        <div class="col-sm-12">
            <h3>Recomendações</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12" style="padding-top: 2rem;padding-bottom: 2rem;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="background-color: gray;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('slides/aviso_1.png')}}" class="d-block w-100"  alt="Primeiro Slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('slides/aviso_2.png')}}" class="d-block w-100"  alt="Segundo Slide">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('slides/aviso_3.png')}}" class="d-block w-100" alt="Terceiro Slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
    </div>
@endsection
