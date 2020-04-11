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
                    <!-- logo/cidade -->
                    <div class="col-sm-4" style="padding: 5px; margin-bottom: -20px;">
                        <div class="row justify-content-center">
                            <div class="col styleMenuPrincipal_container_logo">
                                <a href="{{route('inicio')}}"class="styleMenuPrincipal_titulo" style="color: black; ">
                                <img id="styleMenuPrincipal_imagem_logo" src="{{asset('icones/encontreecompre_logo.svg')}}" width="170px"></a>
                            </div>
                            <div class="col">
                                <div class="styleMenuPrincipal_container_select">
                                    <form action="{{route('alterar.municipio')}}" method="POST">
                                        @csrf
                                        <select class="custom-select" name="cidade"  onchange="this.form.submit()" id="styleMenuPrincipal_select">
                                            @foreach($cidades as $cidade)
                                                @if(Session::get('cidade') == $cidade->nome)
                                                    <option selected value="{{$cidade->nome}}">{{$cidade->nome}}</option>
                                                @else
                                                    <option  value="{{$cidade->nome}}">{{$cidade->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--x logo/cidade x-->

                    <div class="col-sm-8">
                    <!-- pesquisar -->
                        <form method="post" action="{{route('estabelecimento.busca')}}">
                            @csrf
                        <div class="form-group row" style="margin-top: 23px; margin-bottom: 1px;">

                            <div class="col-sm-8" style="">
                                <div class="input-group mb-3">
                                  <input type="text" minlength="3" required class="form-control" placeholder="Digite o nome do estabelecimento ou categoria" aria-label="Recipient's username" aria-describedby="basic-addon2" name="pesquisa" id="pesquisa" style="height: 40px; border-color: #f0f0f0; border-radius: 6px;">
                                  <div class="input-group-append" style="margin-left: 5px; ">
                                    <button type="submit" class="btn btn-sm styleMenuPrincipalBotaoPesquisar" style="border-radius: 6px;">
                                        <img src="{{asset('icones/procurar.svg')}}" width="20px">
                                        <!-- <a style="color: #1f56fc; font-family: arial; font-size: 15px;">Pesquisar</a> -->
                                    </button>
                                  </div>
                                </div>
                            </div>
                            </form>
                    <!--x pesquisar x-->
                    <!-- cadastre-se -->
                            <div class="col-sm-4">
                                <div class="row ">
                                    <div class="col-sm-8">
                                        @guest
                                        <form method="get" action="{{route('estabelecimento.create')}}">
                                            <button type="submit" class="btn btn-sm styleMenuPrincipalBotaoCadastrar">Cadastre-se</button>
                                        </form>
                                        @endguest
                                        @auth
                                          @can('autorizarCadastro',App\Estabelecimento::class)
                                            <form method="get" action="{{route('estabelecimento.pending')}}">
                                                <button type="submit" class="btn btn-sm styleMenuPrincipalBotaoCadastrar">Pendentes</button>
                                            </form>
                                          @endcan
                                          @cannot('autorizarCadastro',App\Estabelecimento::class)
                                            <form method="get" action="{{route('estabelecimento.edit')}}">
                                                <button type="submit" class="btn btn-sm styleMenuPrincipalBotaoCadastrar">Perfil</button>
                                            </form>
                                          @endcan
                                        @endauth
                                    </div>
                                    @guest
                                      <!-- <form action="{{route('login')}}" method="post"> -->
                                        <div class="col-sm-4">
                                            <a class="btn" id="styleMenuPrincipal_login_botao" href="{{route('login')}}">Login</a>
                                        </div>
                                        <!-- Login -->
                                        <!-- <div class="col card card-body styleMenuPrincipal_container_login" id="divLogar" style="display:none">
                                          <div class="row justify-content-center" style="text-align: center;">
                                              <div class="col-sm-12" style="text-align: right;">
                                                  <img src="{{asset('icones/fechar_logo.svg')}}" width="15px" onclick="logar()" style="cursor:pointer;"></a>
                                              </div>
                                              <div class="col-sm-12">
                                                  <img id="styleMenuPrincipal_imagem_logo" src="{{asset('icones/encontreecompre_logo.svg')}}" width="150px"></a>
                                              </div>
                                              <div class="col-sm-12" style="margin-top: 10px;">
                                                  <label>Entrar</label>
                                              </div>
                                              <div class="col-sm-12" style="text-align: left;">
                                                  <label>E-mail</label>
                                                  <input type="email" class="form-control styleMenuPrincipal_login_input" id="divLogar_email" name="email">
                                              </div>
                                              <div class="col-sm-12" style="text-align: left; margin-top: 5px;">
                                                  <label>Senha</label>
                                                  <input type="password" class="form-control styleMenuPrincipal_login_input" id="divLogar_senha" name="senha">
                                              </div>
                                              <div class="col-sm-12" style="margin-left: 40px; text-align: left; margin-top: 5px;">
                                                  <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                                  <label class="form-check-label" for="exampleCheck1">Contínuar conectado</label>
                                              </div>
                                              <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                  <button type="submit" class="btn styleMenuPrincipal_button_logar">Entrar</button>
                                              </div>
                                              <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                  <a href="{{ route('password.request') }}" style="color: #1492e6; font-size: 12px;">Não consegue acessar sua conta?</a>
                                              </div>
                                          </div>
                                        </div> -->
                                      <!-- </form> -->
                                    @endguest
                                    @auth
                                      <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <button class="btn" id="styleMenuPrincipal_login_botao" type="submit">
                                          Sair
                                        </button>
                                      </form>
                                    @endauth
                                    <!--x Login x-->
                                </div>
                            </div>
                    <!--x entrar x-->
                        </div>
                    </div>
                    <!-- <div class="col-sm-2" style="background-color: green;">logo/cidade</div> -->
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
        <div style="background-color: #1492e6;">
            <!-- rodape 1 -->
            <div class="container" id="styleRodape_Container_Rodape_1">
                <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="row justify-content-center">
                                <div class="col-sm-12 styleRodape_Imagem_ufape">
                                    <a href="http://ww3.uag.ufrpe.br/" target="_blank"><img src="{{ asset('/icones/ufape_logo2.png') }}" alt="Logo" width="30px;" /></a>
                                </div>
                                <div class="col-sm-12 styleRodape_Texto">
                                    <a href="http://ww3.uag.ufrpe.br/" target="_blank"><label>Universidade Federal do Agreste de Pernambuco</label></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 styleRodape_Imagem_lmts">
                                    <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{ asset('/icones/lmts_logo.png') }}" alt="Logo" width="125px;" /></a>
                                </div>
                                <div class="col-sm-12 styleRodape_Texto" style="padding-top: 4px;">
                                    <a target="_blank" href="http://lmts.uag.ufrpe.br/"><label>Laboratório Multidisciplinar de Tecnologias Sociais</label></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="row container styleRodape_Container">
                        <div class="col-md-12 styleRodape_Texto_Titulo">Mapa do site</div>
                        <div class="col-md-12"  style="font-family: arial; font-size: 15px; color: white;">
                            <a href="{{route('inicio')}}" style="color: white;">Home</a>
                        </div>
                        <div class="col-md-12"  style="font-family: arial; font-size: 15px; color: white;">A plataforma</div>
                        <div class="col-md-12"  style="font-family: arial; font-size: 15px; color: white;">Apoio/Patrocínio</div>
                        <div class="col-md-12"  style="font-family: arial; font-size: 15px; color: white;">Cadastre-se</div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row justify-content-center styleRodape_Container_Apoio">
                        <div class="col-sm-12 styleRodape_Texto_Titulo" style="margin-left: 6px; margin-bottom:5px;">Apoio</div>
                        <div class="col-sm-3 styleRodape_Apoio_div" style="margin-top: 2px; margin-bottom: 2px;">
                            <a href="https://www.sebrae.com.br/sites/PortalSebrae/ufs/pe?codUf=18" target="_blank"> <img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/sebrae_mini_logo.png') }}" alt="Logo" width="90px;" /></a>
                        </div>
                        <div class="col-sm-3"  style="margin-top: 2px; margin-bottom: 2px;">
                            <a href="http://www.pe.senac.br/unidades/garanhuns/" target="_blank"><img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/senac_mini_logo.png')}}" alt="Logo" width="90px;"/></a>
                        </div>
                        <div class="col-sm-3"  style="margin-top: 2px; margin-bottom: 2px;">
                            <a href="https://pt-br.facebook.com/cdlgus" target="_blank"><img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/cdl_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                        </div>
                        <div class="col-sm-3"  style="margin-top: 2px; margin-bottom: 2px;">
                            <a href="http://bcc.uag.ufrpe.br/~portal/" target="_blank"><img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/bcc_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center styleRodape_container styleRodape_linha_top">
                    <div class="btg-group" style="padding: 5px;">
                        <img src="{{ asset('/icones/local_logo.svg') }}" alt="Logo" width="15px;" />
                        <a href="https://www.google.com/maps/place/UFAPE+-+Universidade+Federal+do+Agreste+de+Pernambuco/@-8.9067588,-36.4943075,15z/data=!4m5!3m4!1s0x0:0x9e8a2fd11fab3580!8m2!3d-8.9067588!4d-36.4943075" target="_blank" class="styleRodape_Texto" style="padding: 0.5rem; color: white; font-weight: normal;">Avenida Bom Pastor. s/nº Bairro Boa Vista - CEP 55292-270 - Garanhuns - PE</a>
                    </div>
                </div>
            </div>
            <!-- rodape 2 -->
            <div class="container" id="styleRodape_Container_Rodape_2">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 styleRodape_Texto_Titulo">Mapa do site</div>
                            <div class="col-sm-12">
                                <div class="row justify-content-left">
                                    <div class="col-sm-3" style="font-family: arial; font-size: 15px; color: white;">A plataforma</div>
                                    <div class="col-sm-3" style="font-family: arial; font-size: 15px; color: white;">Apoio/Patrocínio</div>
                                    <div class="col-sm-3" style="font-family: arial; font-size: 15px; color: white;">Cadastre-se</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 styleRodape_Texto_Titulo">Realização</div>
                            <div class="col-sm-6">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleRodape_Imagem_ufape">
                                        <a href="http://ww3.uag.ufrpe.br/" target="_blank"><img src="{{ asset('/icones/ufape_logo2.png') }}" alt="Logo" width="30px;" /></a>
                                    </div>
                                    <div class="col-sm-12 styleRodape_Texto">
                                        <a href="http://ww3.uag.ufrpe.br/" target="_blank"><label>Universidade Federal do Agreste de Pernambuco</label></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12 styleRodape_Imagem_lmts">
                                        <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{ asset('/icones/lmts_logo.png') }}" alt="Logo" width="125px;" /></a>
                                    </div>
                                    <div class="col-sm-12 styleRodape_Texto" style="padding-top: 4px;">
                                        <a target="_blank" href="http://lmts.uag.ufrpe.br/"><label>Laboratório Multidisciplinar de Tecnologias Sociais</label></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 styleRodape_Texto_Titulo">Apoio</div>
                            <div class="row" style="text-align: center; width: 100%; margin-left: 6px; margin-bottom:5px; background-color: pink;">
                                <div class="col-sm-3 styleRodape_Apoio_div" style="margin-top: 2px; margin-bottom: 2px;">
                                    <a href="https://www.sebrae.com.br/sites/PortalSebrae/ufs/pe?codUf=18" target="_blank"> <img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/sebrae_mini_logo.png') }}" alt="Logo" width="90px;" /></a>
                                </div>
                                <div class="col-sm-3"  style="margin-top: 2px; margin-bottom: 2px;">
                                    <a href="http://www.pe.senac.br/unidades/garanhuns/" target="_blank"><img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/senac_mini_logo.png')}}" alt="Logo" width="90px;"/></a>
                                </div>
                                <div class="col-sm-3"  style="margin-top: 2px; margin-bottom: 2px;">
                                    <a href="https://pt-br.facebook.com/cdlgus" target="_blank"><img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/cdl_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                                </div>
                                <div class="col-sm-3"  style="margin-top: 2px; margin-bottom: 2px;">
                                    <a href="http://bcc.uag.ufrpe.br/~portal/" target="_blank"><img class="styleRodape_Imagem_Apoio" src="{{ asset('/icones/bcc_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row justify-content-center styleRodape_container styleRodape_linha_top">
                        <div class="btg-group" style="padding: 5px;">
                            <img src="{{ asset('/icones/local_logo.svg') }}" alt="Logo" width="15px;" />
                            <a href="https://www.google.com/maps/place/UFAPE+-+Universidade+Federal+do+Agreste+de+Pernambuco/@-8.9067588,-36.4943075,15z/data=!4m5!3m4!1s0x0:0x9e8a2fd11fab3580!8m2!3d-8.9067588!4d-36.4943075" target="_blank" class="styleRodape_Texto" style="padding: 0.5rem; color: white; font-weight: normal;">Avenida Bom Pastor. s/nº Bairro Boa Vista - CEP 55292-270 - Garanhuns - PE</a>
                        </div>
                    </div>
            </div>

            <!-- <div class="row justify-content-center">
                <div class="col-sm-4" style="background-color: blue;">
                    <div class="row">
                        <div class="col-sm-6">UFAPE</div>
                        <div class="col-sm-6">LMTS</div>
                    </div>
                </div>
                <div class="col-sm-3" style="background-color: red;">
                    <div class="row container">
                        <div class="col-md-12" style="padding-bottom: 10px; padding-top: 10px;">Mapa do site</div>
                        <div class="col-md-12">OP - 1</div>
                        <div class="col-md-12">OP - 2</div>
                        <div class="col-md-12">OP - 3</div>
                        <div class="col-md-12">OP - 4</div>
                        <div class="col-md-12">OP - 5</div>
                        <div class="col-md-12">OP - 6</div>

                    </div>
                </div>
                <div class="col-sm-5" style="background-color: green;">
                    <div class="row ">
                        <div class="col-sm-12" style="padding-bottom: 40px; padding-top: 10px;">Apoio</div>
                        <div class="col-sm-2">
                            <a href="https://www.sebrae.com.br/sites/PortalSebrae/ufs/pe?codUf=18" target="_blank"> <img src="{{ asset('/icones/sebrae_mini_logo.png') }}" alt="Logo" width="90px;" /></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="http://www.cndl.org.br/unidades/cdls/?estado=PE" target="_blank"><img src="{{ asset('/icones/senac_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="http://www.cndl.org.br/unidades/cdls/?estado=PE" target="_blank"><img src="{{ asset('/icones/cdl_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                        </div>
                        <div class="col-sm-2">
                            <a href="http://www.cndl.org.br/unidades/cdls/?estado=PE" target="_blank"><img src="{{ asset('/icones/bcc_mini_logo.png')}}" alt="Logo" width="90px;" /></a>
                        </div>
                    </div>
                </div>
            </div>
            <div>Local</div> -->
            
        </div>
        <!--x rodape x-->
    </div>
    @hasSection ('javascript')
        @yield('javascript')
    @else
    @endif
    <script type="text/javascript">
        /*
        * Função criada para abrir/fechar a div logar
        */
        function logar(){
            if(document.getElementById("divLogar").style.display == 'none'){
                document.getElementById("divLogar").style.display = 'block';
                document.getElementById("divLogar_email").value = "";
                document.getElementById("divLogar_senha").value = "";
            }else{
                document.getElementById("divLogar").style.display = 'none';
            }
        }
    </script>
</body>
</html>
