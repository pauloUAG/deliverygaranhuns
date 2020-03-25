@extends('layouts.app')

@section('content')
    <?php
    $total = count($modalidades);
    $slides = intdiv($total, 5);
    ?>

    <div class="row">
        <div class="col-md-12">
            <h3>Categorias</h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php $pagina=0; $contador=-1; ?>
        @foreach($modalidades as $modalidade)
            <?php $contador ++; $pagina=($contador%5==0&&$contador>0)?$pagina+1:$pagina; ?>
            <div class="styleCategoria_button_padding">
                <a href="{{ route('categoria.show', ['pagina'=>$pagina,'id' => $modalidade->id]) }}"class="btn styleCategoria_button" style="display: block; line-height: 110px;">
                    <span style="line-height: normal; display: inline-block; vertical-align: middle;">
                    <div class="container" >
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleCategoria_imagem">
                                <img src="{{ asset('/icones/' . $modalidade->icone ) }}" alt="{{ $modalidade->nome }}" width="35px;">
                            </div>
                            <div class="col-sm-12">
                                <label>{{ $modalidade->nome }}</label>
                            </div>
                        </div>
                    </div>
                    </span>
                </a>
            </div>
        @endforeach
    </div>



@endsection
