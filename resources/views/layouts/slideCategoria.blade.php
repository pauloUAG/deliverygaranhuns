<div class="w3-content w3-display-container">
    <?php
    $total = count($modalidades);
    $slides = intdiv($total, 5);
    ?>
    
    @for($s=0; $s <= $slides; $s++)
    {{-- {{$s}} --}}
        <div class="mySlides" >
            <div class="col-md-12">
                <div class="container">
                    <div class="row justify-content-center">
                        @for($i=0; $i < 5 && ($s * 5 + $i) < $total;$i++)
                            <?php $modalidade = $modalidades[$s * 5 + $i]; ?>
                            <div class="styleCategoria_conteiner_button">
                            <a href="{{ route('categoria.show', ['pagina'=>$s,'id' => $modalidade->id]) }}" class="btn styleCategoria_button " style="display: block; line-height: 110px; @if(isset($modalidadeS) && $modalidadeS == $modalidade->id )border: 3px solid red; @endif">
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
                        @endfor

                    </div>
                </div>
            </div>
        </div>
    @endfor

    <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>



<script>
    var pag = {{ $pagina ?? 0}}
    // console.log(pag);
    var slideIndex = pag+1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex-1].style.display = "block";
    }
</script>

<div class="row" align="center">
    <div class="col-sm-12">
        <a href="{{route('categoria.list')}}" class="btn btn-outline-dark">Ver todas as categorias</a>
    </div>
</div>
