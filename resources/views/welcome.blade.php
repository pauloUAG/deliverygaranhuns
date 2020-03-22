@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <label>Categoria</label>
        </div>
        <div class="col-md-12">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="styleCategoria_conteiner_button">
                        <button class="btn styleCategoria_button">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleCategoria_imagem">
                                        <img src="icones/comida_logo.svg" alt="Logo" width="40px;" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Quentinha</label>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="styleCategoria_conteiner_button">
                        <button class="btn styleCategoria_button" >
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleCategoria_imagem">
                                        <img src="icones/padaria_logo.svg" alt="Logo" width="50px;" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Padaria</label>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="styleCategoria_conteiner_button">
                        <button class="btn styleCategoria_button" >
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleCategoria_imagem">
                                        <img src="icones/farmacia_logo.svg" alt="Logo" width="50px;" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Farmácia</label>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="styleCategoria_conteiner_button">
                        <button class="btn styleCategoria_button" >
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleCategoria_imagem">
                                        <img src="icones/agua_logo.svg" alt="Logo" width="25px;" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Água</label>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                    <div class="styleCategoria_conteiner_button">
                        <button class="btn styleCategoria_button" >
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleCategoria_imagem">
                                        <img src="icones/gas_logo.svg" alt="Logo" width="44px;" />
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Gás</label>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-12" style="padding-top: 2rem;padding-bottom: 2rem;">
            <label>Recomendações</label>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="height:350px; background-color: gray;">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100"  alt="Primeiro Slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100"  alt="Segundo Slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" alt="Terceiro Slide">
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
