@extends('layouts.app')

@section('content')
@if ($message = Session::get('errors'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>ERRO NO CADASTRO!</strong> Corrija as informações marcadas abaixo e tente novamente.
    </div>
@endif

<div class="container ">
    <div class="row titulo col-md-12">
        <h1>Cadastro</h1>
    </div>

    <div class="col-md-12">
        <form id="formCadastro" method="POST" enctype="multipart/form-data" action="{{ route('estabelecimento.save') }}">
            @csrf

            <div class="row subtitulo">
                <div class="col-sm-12">
                    <p>Dados do Estabelecimento / Vendedor</p>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="modalidade_id" class="col-form-label">Categoria *</label>
                    <select class="browser-default custom-select" id="modalidade_id" required name="modalidade_id">
                        <option value="" disable="" selected="" hidden="">-- Selecionar a Categoria --</option>
                        @foreach($modalidades as $modalidade)
                            <option value="{{ $modalidade->id }}" @if($modalidade->id == old('modalidade_id')) selected @endif>{{ $modalidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="col-form-label">Nome *</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-6">
                    <label for="site" class="col-form-label">Site</label>
                    <input id="site" placeholder="http://exemplo.com" type="url" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ old('site') }}"  autocomplete="site" autofocus>

                    @error('site')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="col-form-label" for="imagemCapa">Imagem de Capa (jpg ou png)</label>
                    <input type="file" class="form-control-file" id="imagemCapa" name="imagemCapa" placeholder="Selecione um arquivo" />

                    @error('imagemcapa')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col-md-3">
                    <label class="col-form-label" for="imagemInterna">Imagem Interna  (jpg ou png)</label>
                    <input type="file" class="form-control-file" id="imagemInterna" name="imagemInterna" placeholder="Selecione um arquivo" />
                    @error('imageminterna')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="descricao" class="col-form-label">Descrição *</label>
                    <textarea data-ls-module="charCounter" maxlength="255" id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" required autocomplete="name" autofocus>{{ old('descricao') }}</textarea>

                    @error('descricao')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="horarioFuncionamento" class="col-form-label">Horário de Funcionamento</label>
                    <input id="horarioFuncionamento" placeholder="Seg a Sex das 8:00h às 18:00h" type="text" class="form-control @error('horarioFuncionamento') is-invalid @enderror" name="horarioFuncionamento" value="{{ old('horarioFuncionamento') }}"  autocomplete="horarioFuncionamento" autofocus>

                    @error('horarioFuncionamento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-7">
                    <label class="col-form-label"><strong>Formas de Pagamento</strong></label>
                    <div >
                        <div class="form-check form-check-inline">
                            <input id="dinheiro" @if(old('pagamentoDinheiro')) checked @endif  type="checkbox" class="form-check-input" id="pagamentoDinheiro" name="pagamentoDinheiro">
                            <label class="form-check-label" for="pagamentoDinheiro">Dinheiro</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="transf" @if(old('pagamentoTransferencia')) checked @endif type="checkbox" class="form-check-input" id="pagamentoTransferencia" name="pagamentoTransferencia">
                            <label class="form-check-label" for="pagamentoTransferencia">Transferência</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="credito" @if(old('pagamentoCredito'))  checked @endif type="checkbox" class="form-check-input" id="pagamentoCredito" name="pagamentoCredito">
                            <label class="form-check-label" for="pagamentoCredito">Cartão de Crédito</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="debito" @if(old('pagamentoDebito')) checked @endif type="checkbox" class="form-check-input" id="pagamentoDebito" name="pagamentoDebito">
                            <label class="form-check-label" for="pagamentoDebito">Cartão de Débito</label>
                        </div>
                    </div>

                </div>

                <div class="col-md-5">
                    <label for="cnpj" class="col-form-label">Cnpj (opcional)</label>
                    <input id="cnpj" type="text" minlength="14" maxlength="18" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}"  autocomplete="cnpj">

                    @error('cnpj')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 subtitulo">
                    Contatos
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col-md-4">
                    <label for="facebook" class="col-form-label">Facebook</label>
                    <input id="facebook" placeholder="http://facebook.com/usuario" type="url" class="form-control" name="facebook" value="{{ old('facebook') }}" autocomplete="facebook">
                </div>
                <div class="col-md-4">
                    <label for="instagram" class="col-form-label">Instagram</label>
                    <input id="instagram" placeholder="@usuario" type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" autocomplete="instagram">
                </div>
                <div class="col-md-4">
                    <label for="twitter" class="col-form-label">Twitter</label>
                    <input id="twitter" placeholder="@usuario" type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" autocomplete="twitter">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 subtitulo">
                    Telefones
                </div>
            </div>

            <div class="row" style="margin-top:20px">
                <div class="col-md-12">
                    <div id="telefones">
                        <?php
                            $qtdTelefone = (null===old('telefone'))?0:count(old('telefone'));
                        ?>

                        @if($qtdTelefone >0)
                            @for($i=0;$i<$qtdTelefone;$i++)
                                <div class='row align-items-end' >
                                    <div class='col-md-4'>
                                        <label class='col-form-label'>Telefone *</label>
                                        <input type='text' class='celular form-control' name='telefone[]' value="{{ old('telefone')[$i] }}" required autofocus>
                                    </div>
                                    <!-- <div class='col-md-4'>
                                        <label class='col-form-label'>Operadora *</label>
                                        <input type='text' class='form-control' name='operadora[]' value="{{ old('operadora')[$i] }}" required autofocus>
                                    </div> -->
                                    <div class='col-md-4'>
                                        <label class='col-form-label'>Operadora *</label>
                                        <select class="form-control" name='operadora[]' required autofocus>
                                            <option @if(old('operadora')[$i] == "Fixo") selected @endif value="Fixo">Fixo</option>
                                            <option @if(old('operadora')[$i] == "Vivo") selected @endif value="Vivo">Vivo</option>
                                            <option @if(old('operadora')[$i] == "Claro") selected @endif value="Claro">Claro</option>
                                            <option @if(old('operadora')[$i] == "TIM") selected @endif value="TIM">TIM</option>
                                            <option @if(old('operadora')[$i] == "Oi") selected @endif value="Oi">Oi</option>
                                            <option @if(old('operadora')[$i] == "Nextel") selected @endif value="Nextel">Nextel</option>
                                            <option @if(old('operadora')[$i] == "Algar") selected @endif value="Algar">Algar</option>
                                            <option @if(old('operadora')[$i] == "Sercomtel") selected @endif value="Sercomtel">Sercomtel</option>
                                            <option @if(old('operadora')[$i] == "MVNO’s (Porto Seguro, Datora e Terapar)") selected @endif value="MVNO’s (Porto Seguro, Datora e Terapar)">MVNO’s (Porto Seguro, Datora e Terapar)</option>
                                        </select>
                                    </div>
                                    <div class='col-md-3' >
                                        <input type='hidden' name='zap[]' value='{{ old('zap')[$i]}}'><input type='checkbox' @if(old('zap')[$i]) checked @endif class='form-check-input' name='zap1[]' autofocus onclick='this.previousElementSibling.value=1-this.previousElementSibling.value; '>
                                        <label class='form-check-label'>Whatsapp</label>
                                    </div>
                                    @if($i>0)
                                    <div class='col-md-1'>
                                        <input type='button' class='btn btn-danger' value='X' onclick='deletar(this)' />
                                    </div>
                                    @endif
                                </div>
                            @endfor
                        @else
                            <div class='row align-items-end' >
                                <div class='col-md-4'>
                                    <label class='col-form-label'>Telefone *</label>
                                    <input type='text' class='celular form-control' name='telefone[]' required autofocus>
                                </div>
                                <!-- <div class='col-md-4'>
                                    <label class='col-form-label'>Operadora *</label>
                                    <input type='text' class='form-control' name='operadora[]' required autofocus>
                                </div> -->
                                <div class='col-md-4'>
                                    <label class='col-form-label'>Operadora *</label>
                                    <select class="form-control" name="operadora[]" required autofocus>
                                        <option value="Fixo">Fixo</option>
                                        <option value="Vivo">Vivo</option>
                                        <option value="Claro">Claro</option>
                                        <option value="TIM">TIM</option>
                                        <option value="Oi">Oi</option>
                                        <option value="Nextel">Nextel</option>
                                        <option value="Algar">Algar</option>
                                        <option value="Sercomtel">Sercomtel</option>
                                        <option value="MVNO’s (Porto Seguro, Datora e Terapar)">MVNO’s (Porto Seguro, Datora e Terapar)</option>
                                    </select>
                                </div>
                                <div class='col-md-3' >
                                    <input type='hidden' name='zap[]'  value='0'><input type='checkbox' class='form-check-input' name='zap1[]' autofocus onclick='this.previousElementSibling.value=1-this.previousElementSibling.value; ' style="margin-left:5px">
                                    <label class='form-check-label' style="margin-left:25px">Whatsapp</label>
                                </div>
                            </div>
                        @endif
                    </div>
                    <input type="button" onclick="adicionarTelefone()" class="btn btn-primary" id="addCoautor" style="width:100%;margin-top:10px" value="Novo Telefone"></input>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 subtitulo">
                    Acesso ao Sistema
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="email" class="col-form-label">E-mail *</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="password" class="col-form-label">Senha (no mínimo 8 letras/números)*</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="password-confirm" class="col-form-label">Confirme a Senha *</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="row subtitulo">
                <div class="col-sm-12">
                    <p>Endereço</p>
                </div>
            </div>

            {{-- Rua | Número | Bairro --}}
            <div class="form-group row">
                <div class="col-md-2">
                    <label for="?" class="col-form-label">CEP *</label>
                    <input value="{{old('cep')}}" onblur="pesquisacep(this.value);" id="cep" type="text" required autocomplete="cep" name="cep" autofocus class="form-control field__input a-field__input" placeholder="CEP" size="10" maxlength="9" >
                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="rua" class="col-form-label">Rua *</label>
                    <input value="{{old('rua')}}" id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" required >
                    @error('rua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="numero" class="col-form-label">{{ __('Número') }}</label>
                    <input value="{{old('numero')}}" id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" autocomplete="numero">
                    @error('numero')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="bairro" class="col-form-label">Bairro</label>
                    <input value="{{old('bairro')}}" id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" >
                </div>
                <div class="col-md-4">
                    <label for="bairro" class="col-form-label">Cidade *</label>
                    <input readonly type="text" class="form-control" name="cidade" id="cidade" required value="{{ old('cidade') }}" />
                </div>
                <div class="col-md-4">
                    <label for="bairro" class="col-form-label">UF</label>
                    <input readonly type="text" class="form-control" name="uf" id="uf" value="{{ old('uf') }}" />
                </div>

            </div>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle"><strong>Termos e condições gerais de uso do site</strong></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <p align="justify">O <b>Encontre & Compre</b> é uma plataforma desenvolvida pela Universidade Federal do Agreste 
                            de Pernambuco (UFAPE), por meio do Laboratório Multidisciplinar de Tecnologias Sociais (LMTS), 
                            com intuito de facilitar as relações de comércio, profundamente afetadas pela pandemia 
                            de Coronavírus, mas não se limita à vigência de seus efeitos. Os desenvolvedores, como entes 
                            públicos, não praticam a exploração com fins lucrativos da plataforma e seu uso é inteiramente 
                            gratuito, não havendo nenhum tipo de taxa ou cobrança relacionados ao seu uso.</p>

                            <p align="justify">Ace  itar integralmente os termos e condições gerais de uso é condição fundamental 
                            para qualquer pessoa que deseje utilizar os serviços do <b>Encontre & Compre</b>. O interessado 
                            após realizar realizar o cadastro e ter aceito os termos e condições gerais de uso, 
                            passa a ter acesso como usuário ao site.</p>

                            <p align="justify">Os serviços objeto dos presentes Termos e condições gerais consistem em (i) prover espaços 
                            no site para que os usuários anunciem seus produtos e/ou serviços e (ii) facilitar o contato 
                            direto entre usuários vendedores e interessados em adquirir os produtos e serviços anunciados, 
                            por meio da divulgação dos dados de contato de uma parte à outra. O <b>Encontre & Compre</b>, portanto, 
                            torna possível a comunicação entre usuários e potenciais clientes para que os mesmos negociem 
                            entre si, sem qualquer intervenção ou intermediação na negociação ou na concretização dos 
                            negócios. Assim sendo, ressalta-se que o <b>Encontre & Compre</b> não fornece quaisquer produtos ou 
                            serviços anunciados pelos no Site.</p>

                            <p align="justify">Os Usuários anunciantes/potenciais vendedores somente poderão anunciar produtos ou serviços 
                            que estejam autorizados a vender e que tenham em estoque, estabelecendo diretamente os termos 
                            do anúncio e todas as suas características (como título, descrição e imagem dos bens, preço, 
                            categoria, quantidade, condições de venda, forma e prazo de entrega, além da forma de pagamento).</p>

                            <p align="justify">O <b>Encontre & Compre</b>, conforme a situação, poderá, sem prejuízo de outras medidas, 
                            recusar qualquer solicitação de cadastro, suspender, temporária ou definitivamente, a conta de um 
                            Usuário e seus anúncios, caso julgue necessário, sem necessidade de justificativa prévia.</p>

                            <p align="justify">Não é permitido anunciar produtos expressamente proibidos pela legislação vigente ou que não 
                            possuam a devida autorização específica de órgãos reguladores competentes, ou que violem direitos 
                            de terceiros;</p>

                            <p align="justify">Cabe ao comprador, antes de decidir pela compra, atentar-se às informações sobre o preço, às 
                            formas de pagamento, à disponibilidade, à forma e ao prazo de entrega dos produtos e serviços.</p>

                            <p align="justify">O <b>Encontre & compre</b> não se responsabiliza por problemas ocorridos durante a negociação, como 
                            falta de pagamento ou a não entrega do bem ou serviço adquirido.</p>

                            <p align="justify">A aceitação destes Termos e condições gerais é absolutamente indispensável à utilização do 
                            <b>Encontre & Compre</b>. O Usuário deverá ler, certificar-se de haver entendido e aceitar todas as 
                            condições estabelecidas nos Termos e condições gerais e nas Políticas de privacidade, assim como nos 
                            demais documentos a eles incorporados por referência, antes de seu cadastro como Usuário do <b>Encontre & Compre</b>.</p>
                            
                            <p align="justify">O Usuário compromete-se a notificar o <b>Encontre & Compre</b> imediatamente, e por meio seguro, a respeito 
                            de qualquer uso não autorizado de sua conta, bem como seu acesso não autorizado por terceiros. 
                            O Usuário será o único responsável pelo conteúdo de seus anúncios, uma vez que o acesso só será possível 
                            mediante a inclusão da senha, que deverá ser de conhecimento e propriedade exclusiva do Usuário.</p>
                            
                            <h4><b>Modificações dos Termos e condições gerais:</b></h4>

                            <p align="justify">O <b>Encontre & Compre</b> poderá alterar, a qualquer tempo, estes Termos e condições gerais, visando 
                            seu aprimoramento e melhoria. As novas versões dos Termos e condições gerais entrarão em vigor 10 
                            (dez) dias após sua publicação nos Sites. O Usuário deverá comunicar-se por e-mail caso não concorde 
                            com os termos alterados dentro do prazo estabelecido para início de vigência.</p>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                {{-- <label class="col-form-label"><strong>Termos de uso e Privacidade! Leia <a href="{{route('termos.privacidade')}}" target="_blank">AQUI</a> os nossos termos.</strong></label> --}}
                <label class="col-form-label"><strong>Termos e condições gerais de uso do site!</strong> Leia clicando <a data-toggle="modal" data-target="#exampleModalLong" style="cursor:pointer;"><strong>AQUI!</strong></a></label>
                <div >
                    <div class="form-check form-check-inline">
                        <input id="termo" type="checkbox" class="form-check-input" name="termo">
                        <label class="form-check-label" for="termo">Aceito os termos e condições gerais de uso do site.</label>
                    </div>
                </div>

            </div>
            <div class="form-group row mb-0" style="margin: 20px 0 20px 0">
                <div class="col-md-6">
                    <a class="btn btn-secondary botao-form" href="{{route('inicio')}}" style="width:100%">Cancelar Cadastro</a>
                </div>
                <div class="col-md-6">
                    <button id="aplica" type="submit" class="btn btn-primary botao-form" style="width:100%" disabled>
                        Concluir Cadastro
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript" >
        var checa = document.getElementById("termo");
        var bt = document.getElementById("aplica");
        checa.onclick = function checar(){
            var cont = document.querySelectorAll("input[name='termo']:checked").length;
            bt.disabled = cont ? false : true;
        }
        function mascara(o,f){
            v_obj=o
            v_fun=f
            setTimeout("execmascara()",1)
        }
        function execmascara(){
            v_obj.value=v_fun(v_obj.value)
        }
        function telefone(v){
            l1 = v.length;
            if(l1 > 15)
                v = v.substring(0,15);

            v=v.replace(/\D/g,"")
            l2 = v.length;

            if(l2 < 3 && l2 > 0)
                v='(' + v;
            else
                v=v.replace(/^(\d\d)(\d)/g,"($1) $2");

            if(l2==11)
                v=v.replace(/(\d{5})(\d)/,"$1-$2");
            else
                v=v.replace(/(\d{4})(\d)/,"$1-$2");

            return v;
        }

        $(document).ready(function($){
            $('#cep').mask('00000-000');
            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('.celular').mask(SPMaskBehavior, spOptions);

        });

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";


                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

        function adicionarTelefone() {
            linha = montarLinhaInput();
            $('#telefones').append(linha);
        }

        function deletar(obj){
            obj.closest('.row').remove();
            return false;
        }

        function montarLinhaInput(){

            return "<div class='row align-items-end' >\n" +
                "                            <div class='col-md-4'>\n" +
                "                                <label class='col-form-label'>Telefone</label>\n" +
                "                                <input onKeyDown='mascara(this, telefone)' type='text' class='celular form-control' name='telefone[]' required autofocus>\n" +
                "                            </div>\n" +
                "                            <div class='col-md-4'>\n" +
                "                                <label class='col-form-label'>Operadora</label>\n" +
                "                                <select class='form-control' name='operadora[]' required autofocus>\n" +
                "                                  <option value='Fixo'>Fixo</option>"+
                "                                  <option value='Vivo'>Vivo</option>"+
                "                                  <option value='Claro'>Claro</option>"+
                "                                  <option value='TIM'>TIM</option>"+
                "                                  <option value='Oi'>Oi</option>"+
                "                                  <option value='Nextel'>Nextel</option>"+
                "                                  <option value='Algar'>Algar</option>"+
                "                                  <option value='Sercomtel'>Sercomtel</option>"+
                "                                  <option value='MVNO’s (Porto Seguro, Datora e Terapar)'>MVNO’s (Porto Seguro, Datora e Terapar)</option>"+
                "                                </select>"+
                "                            </div>\n" +
                "                            <div class='col-md-3' >\n" +
                "                                <input type='hidden' name='zap[]'  value='0'><input type='checkbox' class='form-check-input' name='zap1[]' autofocus onclick='this.previousElementSibling.value=1-this.previousElementSibling.value; ' style="+"margin-left:5px"+">\n" +
                "                                <label class='form-check-label' style="+"margin-left:25px"+">Whatsapp</label>\n" +
                "                            </div>\n" +
                "                            <div class='col-md-1'>\n" +
                "                                <input type='button' class='btn btn-danger' value='X' onclick='deletar(this)' />\n" +
                "                            </div>\n" +
                "                        </div>";
        }

        //checar se existe forma antes de submit o form
        function checkFormaDePagamento(){
          var flag = false;
          if(document.getElementById("dinheiro").checked == true){
            flag = true;
          }
          if(document.getElementById("transf").checked == true){
            flag = true;
          }
          if(document.getElementById("credito").checked == true){
            flag = true;
          }
          if(document.getElementById("debito").checked == true){
            flag = true;
          }
          if(flag){
            document.getElementById("formCadastro").submit();
          }
          else{
            alert("Necessário pelo menos uma forma de pagamento");
          }

        }
    </script>



@endsection
