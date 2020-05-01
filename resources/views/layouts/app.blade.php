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
    <link href="{{ asset('css/autocomplete.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<?php
use Illuminate\Support\Facades\Route;
$rota_nome = Route::currentRouteName();
$rota_parametros = Route::current()->parameters();

?>
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
                                        <form action="{{route('alterar.municipio', ['rota_nome' => $rota_nome, 'rota_parametros' => $rota_parametros])}}" method="POST">
                                        @csrf
                                        <select id="selectCidade" class="custom-select styleMenuPrincipal_container_select" name="cidade"  onchange="this.form.submit()" style="color: #1492e6">
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
                                        <form method="get" action="{{route('estabelecimento.busca')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-9 styleMenuPrincipal_input_pesquisar">
                                                <input type="text" minlength="3" required class="form-control autocomplete" placeholder="Digite o nome do estabelecimento ou categoria" aria-label="Recipient's username" aria-describedby="basic-addon2" name="pesquisa" id="pesquisa" style="width: 100%; height: 38px;">
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
                                                              <label class="form-check-label" for="exampleCheck1">Continuar conectado</label>
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
                                  <a href="http://www.lmts.uag.ufrpe.br/br/content/encontre-compre" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">A Plataforma</a>
                              </div>
                              <div class="col-sm-2">
                                  <a href="http://lmts.uag.ufrpe.br/br/content/apresenta%C3%A7%C3%A3o" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">O Laboratório</a>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Cadastre sua cidade</button>
                              </div>
                              <div class="col-sm-2">
                                  <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Apoio/Patrocínio</button>
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
                              <div class="col-sm-3">
                                <form method="get" action="{{route('estabelecimento.revisar')}}">
                                     <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Revisar</button>
                                 </form>
                             </div>
                              <div class="col-sm-3">
                                <form method="get" action="{{route('cadastro.adminCidade')}}">
                                     <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Cadastrar Administrador</button>
                                 </form>
                             </div>
                             <div class="col-sm-3">
                                <form method="get" action="{{route('admin.municipios')}}">
                                     <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Cadastrar Cidades</button>
                                 </form>
                             </div>
                             <div class="col-sm-3">
                                <form method="get" action="{{route('cadastrar.modalidades')}}">
                                     <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Cadastrar Modalidades</button>
                                 </form>
                             </div>
                             <div class="col-sm-3">
                                <form method="get" action="{{route('carrossel.pagina')}}">
                                     <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Carrossel</button>
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
                        <!-- menu inferior - Admin de cidade -->
                          <div class="col-md-12 styleMenuPrincipal_menuInferior">
                            <div class="row justify-content-center" style="padding-bottom: 5px; padding-top: 5px;">
                                <div class="col-sm-2">
                                    <button class="btn btn-outline-light styleMenuPrincipal_botaoInferior" style="width: 100%">Página Inicial</button>
                                </div>
                                <div>
                                    <form method="get" action="{{route('estabelecimento.listUser')}}">
                                        <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior">Pendentes</button>
                                    </form>
                                </div>
                                <div>
                                  <form method="get" action="{{route('estabelecimentoAdmin.revisar')}}">
                                      <button type="submit" class="btn btn-outline-light styleMenuPrincipal_botaoInferior">Revisar</button>
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
        <div class="styleRodape" id="appRodape">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-sm-2" align="center">
                        <div class="row justify-content-center">
                            <div class="col-sm-12 styleRodape_Imagem_ufape">
                                <a href="http://ww3.uag.ufrpe.br/" target="_blank"><img src="{{ asset('/icones/ufape_logo2.png') }}" alt="Logo" width="40px;" /></a>
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
                    <div class="col-sm-3" align="center">
                      <div class="row justify-content-center">
                        <div class="col-sm-12" id="styleRodape_Texto_Titulo" style="font-weight:bold; font-family:arial">Mapa do site</div>
                        <div class="col-sm-12" id="styleRodape_Texto_Conteudo_MapaDoSite" style=" font-family:arial"><a href="{{route('inicio')}}">Página Inicial</a></div>
                        <div class="col-sm-12" id="styleRodape_Texto_Conteudo_MapaDoSite" style=" font-family:arial"><a href="http://www.lmts.uag.ufrpe.br/br/content/encontre-compre" target="tab">A plataforma</a></div>
                        <div class="col-sm-12" id="styleRodape_Texto_Conteudo_MapaDoSite" style=" font-family:arial"><a href="http://lmts.uag.ufrpe.br/br/content/apresenta%C3%A7%C3%A3o" target="tab">O laboratório</a></div>
                        <div class="col-sm-12" id="styleRodape_Texto_Conteudo_MapaDoSite" style=" font-family:arial"><a href="">Cadastre sua cidade</a></div>
                        <div class="col-sm-12" id="styleRodape_Texto_Conteudo_MapaDoSite" style=" font-family:arial"><a href="">Apoio/Patrocínio</a></div>
                      </div>
                    </div>
                    <div class="col-sm-4" align="left">
                      <div class="row justify-content-center">
                        <div class="col-sm-12" id="styleRodape_Texto_Titulo" style="margin-left:10px; font-weight:bold; font-family:arial">Apoio</div>
                        <div style="margin:3px;"><img src="{{ asset('/icones/sebrae_mini_logo.png') }}" width="80px;" /></div>
                        <div style="margin:3px;"><img src="{{ asset('/icones/senac_mini_logo.png') }}" width="80px;" /></div>
                        <div style="margin:3px;"><img src="{{ asset('/icones/cdl_mini_logo.png') }}" width="80px;" /></div>
                        <div style="margin:3px;"><img src="{{ asset('/icones/bcc_mini_logo.png') }}" width="80px;" /></div>
                      </div>
                    </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12" align="center" style="color:white; margin-top:10px; border-bottom:1px;border-style: solid; border-width:1px;">
            <img src="{{ asset('/icones/local_logo.svg') }}" width="16px;" style="margin-right:8px; margin-top:10px; margin-bottom:10px;"/><a
            href="https://www.google.com/maps/place/UFAPE+-+Universidade+Federal+do+Agreste+de+Pernambuco/@-8.9067588,-36.4943075,15z/data=!4m2!3m1!1s0x0:0x9e8a2fd11fab3580?sa=X&ved=2ahUKEwjegOe_z_voAhXhH7kGHYjPD5EQ_BIwCnoECA0QCg" target="tab"
            style="font-size:14px; font-weight:bold; font-family:arial">Av. Bom Pastor, s/n - Boa Vista, Garanhuns - PE, 55292-270</a>
          </div>
        </div>
        <!--x footer x-->
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
        //auto complete

        function getCategoriasEstabelecimentosPorCidade(cidadeNome){
          $.ajaxSetup({
             headers: {
                 'Content-Type': 'application/json',
                 'X-Requested-With': 'XMLHttpRequest'
             }
          });
          jQuery.ajax({
             url: "{{ route('categoriasEstabelecimentosAjax') }}",
             method: 'get',
             data: {
                cidade: cidadeNome
             },
             success: function(result){
               autocomplete(document.getElementById("pesquisa"), result);

             }
          });
        }

        function autocomplete(inp, arr) {
          /*the autocomplete function takes two arguments,
          the text field element and an array of possible autocompleted values:*/
          var currentFocus;
          /*execute a function when someone writes in the text field:*/
          inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value = this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
                });
                a.appendChild(b);
              }
            }
          });
          /*execute a function presses a key on the keyboard:*/
          inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
          });
          function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
              }
            }
          }
          /*execute a function when someone clicks in the document:*/
          document.addEventListener("click", function (e) {
            closeAllLists(e.target);
          });
        }
        //fim autocomplete
        $( document ).ready(function() {
          //colocar a cidade no parametro quando tiver cidade
          getCategoriasEstabelecimentosPorCidade($('#selectCidade').val());
        });



    </script>
</body>
</html>
