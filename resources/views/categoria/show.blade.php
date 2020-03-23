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
                    @for($i=0; $i<rand(3, 20); $i++)

                        <button class="btn styleCategoriaButton" style="width: 318px;">
                            <div class="container">
                                <div class="row">
                                    <div style="padding: 0.5em; margin-top: 0.5rem;">
                                        <img src="{{ asset('icones/towers.svg') }}" alt="torre" width="65px;">
                                    </div>
                                    <div>
                                        <div class="form-group styleCategoriaButton_container">
                                            <div class="styleCategoriaButton_titulo">Quentinha  da Dona Maria</div>
                                            <div class="styleCategoriaButton_subtitulo">Rua da Prosperidade</div>
                                            <div class="styleCategoriaButton_subtitulo">(81)99192-8384</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>


                    @endfor
                </div>
            </div>
        </div>
    </div>




@endsection
