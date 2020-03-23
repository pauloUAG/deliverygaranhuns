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
        <nav class="navbar styleMenuPrincipal">
            <div class="container">
                <div class="row justify-content-center" style=" width: 100%">
                    <div class="col-sm-3">
                        <a class="styleMenuPrincipal_titulo" style="color: white;">Delivery Garanhuns</a>
                    </div>
                    <div class="col-sm-8">
                        <form method="post" action="{{route('estabelecimento.busca')}}">
                            @csrf
                        <div class="form-group row" style="margin-bottom: 0px;">

                            <div class="col-sm-8">

                                <input class="form-control styleMenuPrincipal_input" id="pesquisa" name="pesquisa" type="search"
                                       placeholder="Digite o nome do estabelecimento ou categoria"  aria-label="Pesquisar">

                            </div>
                            <div class="col-sm-2">
                                <input type="submit" class="btn btn-danger styleMenuPrincipal_button" type="btn" class="btn " value="Pesquisar" ></input>
                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!--x barra menu x-->
        <!-- conteudo -->
        <!-- avisos -->
        <div class="styleConteudo_aviso" align="center">
            <div class="container">
                <div class="row justify-content-center">
                    <img src="{{ asset('/icones/alerta_logo.svg') }}" width="40px;" class="svg" />
                    <div class="col-sm-7">
                        <p class="styleConteudo_mensagem"><strong>#FICAEMCASA</strong> - POR VOCÊ, POR MIM, POR ELES, PELO BEM DE TODOS NÓS.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding-top: 2rem; margin-bottom: 20px;">
            @yield('content')
        </div>

        <div class="styleRodape">
            <div class="container" >
                <div class="row">
                    <div class="col-sm-2" align="center">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleRodape_Imagem_ufape">
                                <img src="{{ asset('/icones/ufape_logo.png') }}" alt="Logo" width="40px;" />
                            </div>
                            <div class="col-sm-12 styleRodape_Texto">
                                <label>Universidade Federal do Agreste de Pernambuco</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2" align="center">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleRodape_Imagem_lmts">
                                <img src="{{ asset('/icones/lmts_logo.png') }}" alt="Logo" width="125px;" />
                            </div>
                            <div class="col-sm-12 styleRodape_Texto">
                                <label>Laboratório Multidisciplinar de Tecnologias Sociais</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2" align="center">
                        <div class="row justify-content-center" >
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Mapa do site</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Quem Somos</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Equipe</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Notícia</div>
                                <div class="col-sm-12 styleRodape_Texto_Conteudo_MapaDoSite">Projetos</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" align="center">
                        <div class="row justify-content-center">
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Contato</div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('icones/instagram_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a class="styleRodape_Texto_Contato" style="color: white;">@deliverygaranhuns</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">

                                        <div class="col">
                                            <img src="{{ asset('icones/facebook_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a class="styleRodape_Texto_Contato" style="color: white;">@deliverygaranhuns</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/icones/@_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a class="styleRodape_Texto_Contato" style="color: white;">deliverygaranhuns@ufrpe.br</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('/icones/instagram_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a class="styleRodape_Texto_Contato" style="color: white;">@deliverygaranhuns</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 " align="center">
                        <div class="row justify-content-center">
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Apoio</div>
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6" style="padding-bottom: 1rem; padding-left: 10px;">
                                            <img src="{{ asset('/icones/prefeitura_logo.png') }}" alt="Logo" width="90px;" />
                                        </div>
                                        <div class="col-sm-6">
                                            <img src="{{ asset('/icones/cdl_logo.png')}}" alt="Logo" width="120px;" />
                                        </div>
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
