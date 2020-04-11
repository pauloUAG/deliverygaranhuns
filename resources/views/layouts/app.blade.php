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
        <nav style="background-color: #f1f1f1;">
            <div class="row">
                <div class="col-md-12" style="text-align: right; padding-top:4px; padding-bottom: 4px; padding-right: 10%">
                    <a href="https://www.instagram.com/encontreecompre.lmts/" target="tab">
                        <img src="{{asset('icones/instagram_cinza_logo.svg')}}" width="25px">
                    </a>
                </div>
            </div>
        </nav>
        <nav class="styleMenuPrincipal" style="background-color:#1492e6;">
            <div class="container">
                <div class="row" style="padding-top: 5px;">
                    <!-- menu superior -->
                    <div class="col-md-12">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 styleMenuPrincipal_container_logo" >
                                <a href="{{route('inicio')}}"><img id="styleMenuPrincipal_logo" src="{{asset('icones/encontreecomprebranco_logo.png')}}" width="150px"></a>
                            </div>
                            <!-- cidade/pesquisar/botao -->
                            <div class="col-md-7" style="padding-top: 7px;">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 styleMenuPrincipal_input_cidade">
                                        <form action="{{route('alterar.municipio')}}" method="POST">
                                        @csrf
                                        <select class="custom-select styleMenuPrincipal_container_select" name="cidade"  onchange="this.form.submit()" style="color: #1492e6">
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
                                    <div class="col-md-9">
                                        <form method="post" action="{{route('estabelecimento.busca')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-9 styleMenuPrincipal_input_pesquisar">
                                                <input type="text" minlength="3" required class="form-control" placeholder="Digite o nome do estabelecimento ou categoria" aria-label="Recipient's username" aria-describedby="basic-addon2" name="pesquisa" id="pesquisa" style="width: 100%; height: 38px;">
                                            </div>
                                            <div class="col-sm-3 styleMenuPrincipal_botao_pesquisar">
                                                <button type="submit" class="btn" id="styleMenuPrincipal_container_BotaoPesquisar">
                                                    <img src="{{asset('icones/pesquisar_branco_logo.svg')}}" width="23px">
                                                    <a id="styleMenuPrincipal_botao">Pesquisar</a>
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- login -->
                            <div class="col-md-3 styleMenuPrincipal_login_container">
                                <div class="row">
                                    <div class="col-md-12">
                                        @guest
                                          <button type="button" class="btn styleMenuPrincipalBotaoCadastrar" onclick="logar()">
                                              <a id="styleMenuPrincipal_login_texto">Olá, faça o seu login ou cadastro</a>
                                              <a id="styleMenuPrincipal_login_texto_aux">Login</a>
                                          </button>
                                        @endguest
                                        @auth
                                        <form action="{{route('logout')}}" method="post">
                                          @csrf
                                          <button class="btn" type="submit" id="styleMenuPrincipal_sair"> 
                                            Sair 
                                          </button>
                                        </form>
                                        @endauth
                                    </div>
                                    <div class="col-md-12 card card-body styleMenuPrincipal_container_login" id="divLogar" style="display:none">
                                        <form method="POST" action="{{ route('login') }}" id="formEntrar">
                                          @csrf
                                          <div class="row justify-content-center" style="text-align: center;">
                                              <div class="col-sm-12" style="text-align: right;">
                                                  <img src="{{asset('icones/fechar_logo.svg')}}" width="15px" onclick="loginClose()" style="cursor:pointer;"></a>
                                              </div>
                                              <div class="col-sm-12">
                                                  <img id="styleMenuPrincipal_imagem_logo" src="{{asset('icones/encontreecompre_logo.svg')}}" width="150px"></a>
                                              </div>
                                                  <div class="col-sm-12" style="margin-top: 10px;">
                                                      <label>Entrar</label>
                                                  </div>
                                                          <div class="col-sm-12" style="text-align: left;">
                                                              <label>E-mail</label>
                                                              <input id="divLogar_email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required >

                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                          </div>
                                                          <div class="col-sm-12" style="text-align: left; margin-top: 5px;">
                                                                <label>Senha</label>
                                                                <input id="divLogar_senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password"autocomplete="current-password" required >

                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                          </div>
                                                          <div class="col-sm-12" style="margin-left: 40px; text-align: left; margin-top: 5px;">
                                                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                              <label class="form-check-label" for="exampleCheck1">Contínuar conectado</label>
                                                          </div>
                                                          <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                              <button type="submit" class="btn styleMenuPrincipal_button_logar" onclick="enviar()">Entrar</button>
                                                          </div>
                                            </form>
                                                   
                                                  <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                      <!-- <a href="{{ route('password.request') }}" style="color: #1492e6; font-size: 12px;">Não consegue acessar sua conta?</a> -->
                                                      <a style="color: #1492e6; font-size: 12px; text-decoration: underline; cursor:pointer;" onclick="logar_esqueciASenha()">Não consegue acessar sua conta?</a>
                                                  </div>
                                                  <br>
                                                  <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                    @guest
                                                    <form method="get" action="{{route('estabelecimento.create')}}">
                                                        <label class="form-check-label" for="exampleCheck1">Crie sua conta!</label>
                                                        <button type="submit" class="btn styleMenuPrincipal_button_cadastro">Cadastre-se</button>
                                                    </form>
                                                    @endguest
                                                  </div>

                                          </div>
                                    </div>
                                    <div class="col-md-12 card card-body styleMenuPrincipal_container_login" id="divLogar_esqueciASenha" style="display:none;">
                                          <div class="row justify-content-center" style="text-align: center;">
                                              <div class="col-sm-12" style="text-align: right;">
                                                  <img src="{{asset('icones/fechar_logo.svg')}}" width="15px" onclick="loginClose()" style="cursor:pointer;"></a>
                                              </div>
                                              <div class="col-sm-12">
                                                  <img id="styleMenuPrincipal_imagem_logo" src="{{asset('icones/encontreecompre_logo.svg')}}" width="150px"></a>
                                              </div>
                                                  <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf
                                                    <div class="col-sm-12" style="margin-top: 10px;">
                                                        <label>Esqueci a senha</label>
                                                    </div>
                                                    <div class="col-sm-12" style="text-align: left;">
                                                        <label>E-mail</label>
                                                        <input type="email" class="form-control styleMenuPrincipal_login_input" id="divLogar_email2" name="email">
                                                    </div>
                                                    <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                      @if (Route::has('password.request'))
                                                        <button type="submit" class="btn styleMenuPrincipal_button_logar">Enviar link de redefinição de senha</button>
                                                      @endif
                                                    </div>
                                                  </form>
                                                  <div class="col-sm-12" style="text-align: left; margin-top: 10px;">
                                                      <button type="button" class="btn btn-outline-secondary" onclick="logar();">Voltar</button>
                                                  </div>
                                                  <br>
                                          </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--x menu superior x-->

                    <!-- menu inferior -->
                    @guest
                    <!-- menu inferior - sem ta logado -->
                      <div class="col-md-12 styleMenuPrincipal_menuInferior">
                          <div class="row justify-content-center" style="padding-bottom: 5px; padding-top: 5px;">
                              <div class="col-sm-2" >
                                  <form method="get" action="{{route('inicio')}}">
                                    <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Página Inicial</button>
                                  </form>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">A Plataforma</button>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">O Laboratório</button>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Cadastre sua cidade</button>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Apoio/Patrocínio</button>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Contato</button>
                              </div>
                          </div>
                      </div>
                      <!--x menu inferior - sem ta logado x-->
                    @endguest
                    @auth
                      @can('autorizarCadastro',App\Estabelecimento::class)
                      <!-- menu inferior - admin do sistema -->
                        <div class="col-md-12 styleMenuPrincipal_menuInferior">
                          <div class="row justify-content-left" style="padding-bottom: 5px; padding-top: 5px;">
                              <div class="col-sm-2">
                                <form method="get" action="{{route('inicio')}}">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Página Inicial</button>
                                </form>
                              </div>
                              <div class="col-sm-3">
                                 <form method="get" action="{{route('estabelecimento.pending')}}">
                                      <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Pendentes</button>
                                  </form>
                              </div>
                          </div>
                        </div>
                        <!--x menu inferior - admin do sistema x-->
                      @endcan
                      @cannot('autorizarCadastro',App\Estabelecimento::class)
                        @if(auth()->user()->tipo == 'ESTABELECIMENTO')
                        <!-- menu inferior - adm de um estabelecimento -->
                          <div class="col-md-12 styleMenuPrincipal_menuInferior">
                            <div class="row justify-content-left" style="padding-bottom: 5px; padding-top: 5px;">
                                <div class="col-sm-2">
                                  <form method="get" action="{{route('inicio')}}">
                                    <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Página Inicial</button>
                                  </form>
                                </div>
                                <div class="col-sm-2">
                                    <form method="get" action="{{route('estabelecimento.edit')}}">
                                        <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Perfil</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                        <!--x menu inferior - adm de um estabelecimento x-->
                        @else
                        <!-- menu inferior - ????? -->
                          <div class="col-md-12 styleMenuPrincipal_menuInferior">
                            <div class="row justify-content-center" style="padding-bottom: 5px; padding-top: 5px;">
                                <div class="col-sm-2">
                                    <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Página Inicial</button>
                                </div>
                                <div>
                                    <form method="get" action="{{route('estabelecimento.listUser', auth()->user()->id)}}">
                                        <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior">Pendentes</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                        @endif
                      @endcan
                    @endauth
                    <!--x menu inferior x-->
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
                                <a href="http://ww3.uag.ufrpe.br/" target="_blank" style="font-weight: normal;"><label>Universidade Federal do Agreste de Pernambuco</label></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3" align="center">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleRodape_Imagem_lmts">
                                <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{ asset('/icones/lmts_logo.png') }}" alt="Logo" width="125px;" /></a>
                            </div>
                            <div class="col-sm-12 styleRodape_Texto">
                                <a target="_blank" href="http://lmts.uag.ufrpe.br/" style="font-weight: normal;"><label>Laboratório Multidisciplinar de Tecnologias Sociais</label></a>
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
                    <div class="col-sm-2" align="center">
                        <div class="row justify-content-center" style="height: 170px;">
                            <div class="styleRodape_linha_left">
                                <div class="col-sm-12 styleRodape_Texto_Titulo">Contato
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <img src="{{ asset('icones/instagram_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a href="https://www.instagram.com/lmts_ufape/" target="_blank" class="styleRodape_Texto_Contato" style="color: white; font-weight: normal;">@lmts_ufape</a>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-12 styleRodape_container">
                                    <div class="row justify-content-center">

                                        <div class="col">
                                            <img src="{{ asset('icones/facebook_logo.svg') }}" alt="Logo" width="20px;" />
                                            <a href="https://www.facebook.com/LMTSUFAPE/" target="_blank" class="styleRodape_Texto_Contato" style="color: white; font-weight: normal;">@LMTSUFAPE</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 styleRodape_container">
                                    <div class="row">
                                        <div class="col">
                                            <!-- <img src="{{ asset('/icones/@_logo.svg') }}" alt="Logo" width="20px;" /> -->
                                            <span>lmts@ufrpe.br</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-1 " align="center" id="apoio">
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
                    <div class="btg-group">
                        <img src="{{ asset('/icones/local_logo.svg') }}" alt="Logo" width="10px;" />
                        <a class="styleRodape_Texto" style="padding: 0.5rem; color: white; font-weight: normal;">Avenida Bom Pastor. s/nº Bairro Boa Vista - CEP 55292-270 - Garanhuns - PE</a>
                    </div>
                </div>
            </div>
        </div>
        <!--x rodape x-->
    </div>
    @hasSection ('javascript')
        @yield('javascript')
    @else
    @endif
    <script type="text/javascript">
        /*
        * condicao para reabrir a div (login) caso o usuario envie algum submit pelo form.
        */
        if(document.getElementById("divLogar_email").value != ""){
            document.getElementById("divLogar").style.display = 'block'; //abrir a div logo apos o carregamento da pagina
        }
        /*
        * Função: abrir/fechar a div "logar"
        */
        function logar(){
            document.getElementById("divLogar_esqueciASenha").style.display = 'none';
            if(document.getElementById("divLogar").style.display == 'none'){
                document.getElementById("divLogar").style.display = 'block';
                document.getElementById("divLogar_email").value = "";
                document.getElementById("divLogar_email").required = false;
                document.getElementById("divLogar_senha").value = "";
                document.getElementById("divLogar_senha").required = false;
            }else{
                document.getElementById("divLogar").style.display = 'none';
            }
        }
        function enviar(){
          if(document.getElementById("divLogar_email").value == "" && document.getElementById("divLogar_senha").value == ""){
            document.getElementById("divLogar_email").required = true;
          }else{
            document.getElementById("formEntrar").submit();
          }
        }
        /*
        * Função:  abrir/fechar a div "esqueci a senha"
        */
        function logar_esqueciASenha(){
            document.getElementById("divLogar_email").value = "";
            document.getElementById("divLogar_senha").value = "";
            document.getElementById("divLogar_email2").value = "";
            document.getElementById("divLogar").style.display = 'none';
            document.getElementById("divLogar_esqueciASenha").style.display = 'block';
            
        }
        function loginClose(){
            document.getElementById("divLogar_email").value = "";
            document.getElementById("divLogar_email2").value = "";
            document.getElementById("divLogar_senha").value = "";
            document.getElementById("divLogar").style.display = 'none';
            document.getElementById("divLogar_esqueciASenha").style.display = 'none';
        }
    </script>
</body>
</html>
