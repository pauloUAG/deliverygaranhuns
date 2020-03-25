<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div id="app">
        <!-- barra menu -->
        <nav class="styleMenuPrincipal">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-3" style="padding-bottom: 10px; text-align: center;">
                        <a href="{{route('inicio')}}"class="styleMenuPrincipal_titulo" style="color: black; ">
                            <img src="{{asset('icones/encontreecompre_logo.svg')}}" width="170px"></a>
                    </div>
                    <div class="col-sm-9">
                        <form method="post" action="{{route('estabelecimento.busca')}}">
                            @csrf
                        <div class="form-group row" style="margin-bottom: 0px;">

                            <div class="col-sm-8" style="">
                                <div class="input-group mb-3">
                                  <input type="text" minlength="3" required class="form-control" placeholder="Digite o nome do estabelecimento ou categoria" aria-label="Recipient's username" aria-describedby="basic-addon2" name="pesquisa" id="pesquisa" style="height: 40px; border-color: #f0f0f0; border-radius: 6px;">
                                  <div class="input-group-append" style="margin-left: 5px; ">
                                    <button type="submit" class="btn btn-sm styleMenuPrincipalBotaoPesquisar" style="border-radius: 6px;">
                                        <img src="{{asset('icones/procurar.svg')}}" width="20px">
                                        <a style="color: #1f56fc; font-family: arial; font-size: 15px;">Pesquisar</a>
                                    </button>
                                  </div>
                                </div>
                            </div>
                            </form>
                            <div class="col-sm-4" >
                                @guest
                                <form method="get" action="{{route('estabelecimento.create')}}">
                                    <button type="submit" class="btn btn-sm styleMenuPrincipalBotaoCadastrar">Cadastre-se</button>
                                </form>
                                @endguest
                                @auth
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger styleMenuPrincipal_button" type="submit">
                                          Sair
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!--x barra menu x-->
        <!-- conteudo -->
        <!-- avisos -->
        {{-- <div class="styleConteudo_aviso" align="center" style="padding-top: 0px;">
            <div class="container" >
                <div class="row justify-content-center">
                    <img src="{{ asset('/icones/alerta_logo.svg') }}" width="40px;" class="svg" />
                    <div class="col-sm-7" >
                        <p class="styleConteudo_mensagem"><strong>#FICAEMCASA</strong> - POR VOCÊ, POR MIM, POR ELES, PELO BEM DE TODOS NÓS.</p>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- <div class="row justify-content-center styleConteudo_aviso" align="center">

            <div class="col-sm-6">
                <img src="{{ asset('/icones/alerta_logo.svg') }}" class="svg" />
                <p class="styleConteudo_mensagem">
                    <strong>#FICAEMCASA</strong> - POR VOCÊ, POR MIM, POR ELES, PELO BEM DE TODOS NÓS.
                </p>
            </div>
        </div> -->
        <div class="container" style="padding-top: 2rem; margin-bottom: 20px;">
            @yield('content')
        </div>

        {{-- footer --}}
        <div class="styleRodape" >
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-sm-2" align="center">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleRodape_Imagem_ufape">
                                <a href="http://ww3.uag.ufrpe.br/" target="_blank"><img src="{{ asset('/icones/ufape_logo.png') }}" alt="Logo" width="40px;" /></a>
                            </div>
                            <div class="col-sm-12 styleRodape_Texto">
                                <a href="http://ww3.uag.ufrpe.br/" target="_blank"><label>Universidade Federal do Agreste de Pernambuco</label></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" align="center">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleRodape_Imagem_lmts">
                                <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{ asset('/icones/lmts_logo.png') }}" alt="Logo" width="125px;" /></a>
                            </div>
                            <div class="col-sm-12 styleRodape_Texto">
                                <a target="_blank" href="http://lmts.uag.ufrpe.br/"><label>Laboratório Multidisciplinar de Tecnologias Sociais</label></a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-sm-2" align="center">
                        <div class="row justify-content-center" >
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Mapa do site</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Quem Somos</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Equipe</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Notícia</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Projetos</div>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-sm-3" align="center">
                        <div class="row justify-content-center" style="height: 170px;">
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Contato</div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('icones/instagram_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a href="https://www.instagram.com/lmts_ufape/" target="_blank" class="styleRodape_Texto_Contato" style="color: white;">@lmts_ufape</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row justify-content-center">

                                        <div class="col">
                                            <img src="{{ asset('icones/facebook_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a href="https://www.facebook.com/LMTSUFAPE/" target="_blank" class="styleRodape_Texto_Contato" style="color: white;">@LMTSUFAPE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/icones/@_logo.svg') }}" alt="Logo" width="20px;" />
                                            <span>lmts@ufrpe.br</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 " align="center" id="apoio">
                        <div class="row justify-content-center" style="height: 170px;">
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Apoio</div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6" style="padding-bottom: 1rem; padding-left: 10px;">
                                           <a href="https://www.sebrae.com.br/sites/PortalSebrae/ufs/pe?codUf=18" target="_blank"> <img src="{{ asset('/icones/sebrae.jpg') }}" alt="Logo" width="90px;" /></a>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <a href="http://www.cndl.org.br/unidades/cdls/?estado=PE" target="_blank"><img src="{{ asset('/icones/cdl_logo.png')}}" alt="Logo" width="120px;" /></a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center styleRodape_container styleRodape_linha_top">
                    <img src="{{ asset('/icones/local_logo.svg') }}" alt="Logo" width="10px;" />
                    <a class="styleRodape_Texto" style="padding: 0.5rem; color: white;">Avenida Bom Pastor. s/nº Bairro Boa Vista - CEP 55292-270 - Garanhuns - PE</a>
                </div>
            </div>
        </div>
        <!--x rodape x-->
    </div>
    @hasSection ('javascript')
        @yield('javascript')
    @else
    @endif
</body>
</html>
