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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Termos de Uso e Privacidade</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            TERMOS DE SERVIÇO

                            ----
                            
                            VISÃO GERAL
                            
                            Esse site é operado pelo Paulo Garanhuns. Em todo o site, os termos “nós”, “nos” e “nosso” se referem ao Paulo Garanhuns. O Paulo Garanhuns proporciona esse site, incluindo todas as informações, ferramentas e serviços disponíveis deste site para você, o usuário, com a condição da sua aceitação de todos os termos, condições, políticas e avisos declarados aqui.
                            
                            Ao visitar nosso site e/ou comprar alguma coisa no nosso site, você está utilizando nossos “Serviços”. Consequentemente, você  concorda com os seguintes termos e condições (“Termos de serviço”, “Termos”), incluindo os termos e condições e políticas adicionais mencionados neste documento e/ou disponíveis por hyperlink. Esses Termos de serviço se aplicam a todos os usuários do site, incluindo, sem limitação, os usuários que são navegadores, fornecedores, clientes, lojistas e/ou contribuidores de conteúdo.
                            
                            Por favor, leia esses Termos de serviço cuidadosamente antes de acessar ou utilizar o nosso site. Ao acessar ou usar qualquer parte do site, você concorda com os Termos de serviço. Se você não concorda com todos os termos e condições desse acordo, então você não pode acessar o site ou usar quaisquer serviços. Se esses Termos de serviço são considerados uma oferta, a aceitação é expressamente limitada a esses Termos de serviço.
                            
                            Quaisquer novos recursos ou ferramentas que forem adicionados à loja atual também devem estar sujeitos aos Termos de serviço. Você pode revisar a versão mais atual dos Termos de serviço quando quiser nesta página. Reservamos o direito de atualizar, alterar ou trocar qualquer parte desses Termos de serviço ao publicar atualizações e/ou alterações no nosso site. É sua responsabilidade verificar as alterações feitas nesta página periodicamente. Seu uso contínuo ou acesso ao site após a publicação de quaisquer alterações constitui aceitação de tais alterações.
                            
                            Nossa loja é hospedada no Shopify Inc. Eles nos fornecem uma plataforma de e-commerce online que nos permite vender nossos produtos e serviços.
                            
                            
                            SEÇÃO 1 - TERMOS DA LOJA VIRTUAL
                            
                            Ao concordar com os Termos de serviço, você confirma que você é maior de idade em seu estado ou província de residência e que você nos deu seu consentimento para permitir que qualquer um dos seus dependentes menores de idade usem esse site.
                            
                            Você não deve usar nossos produtos para qualquer fim ilegal ou não autorizado. Você também não pode, ao usufruir deste Serviço, violar quaisquer leis em sua jurisdição (incluindo, mas não limitado, a leis de direitos autorais).
                            
                            Você não deve transmitir nenhum vírus ou qualquer código de natureza destrutiva.
                            
                            Violar qualquer um dos Termos tem como consequência a rescisão imediata dos seus Serviços.
                            
                            
                            SEÇÃO 2 - CONDIÇÕES GERAIS
                            
                            Reservamos o direito de recusar o serviço a qualquer pessoa por qualquer motivo a qualquer momento.
                            
                            Você entende que o seu conteúdo (não incluindo informações de cartão de crédito), pode ser transferido sem criptografia e pode: (a) ser transmitido por várias redes; e (b) sofrer alterações para se adaptar e se adequar às exigências técnicas de conexão de redes ou dispositivos. As informações de cartão de crédito sempre são criptografadas durante a transferência entre redes.
                            
                            Você concorda em não reproduzir, duplicar, copiar, vender, revender ou explorar qualquer parte do Serviço, uso do Serviço, acesso ao Serviço, ou qualquer contato no site através do qual o serviço é fornecido, sem nossa permissão expressa por escrito.
                            
                            Os títulos usados nesse acordo são incluídos apenas por conveniência e não limitam ou  afetam os Termos.
                            
                            
                            SEÇÃO 3 - PRECISÃO, INTEGRIDADE E ATUALIZAÇÃO DAS INFORMAÇÕES
                            
                            Não somos responsáveis por informações disponibilizadas nesse site que não sejam precisas, completas ou atuais. O material desse site é fornecido apenas para fins informativos e não deve ser usado como a única base para tomar decisões sem consultar fontes de informações primárias, mais precisas, mais completas ou mais atuais. Qualquer utilização do material desse site é por sua conta e risco.
                            
                            Esse site pode conter certas informações históricas. As informações históricas podem não ser atuais e são fornecidas apenas para sua referência. Reservamos o direito de modificar o conteúdo desse site a qualquer momento, mas nós não temos obrigação de atualizar nenhuma informação em nosso site. Você concorda que é de sua responsabilidade monitorar alterações no nosso site.
                            
                            
                            SEÇÃO 4 - MODIFICAÇÕES DO SERVIÇO E PREÇOS
                            
                            Os preços dos nossos produtos são sujeitos a alterações sem notificação.
                            
                            Reservamos o direito de, a qualquer momento, modificar ou descontinuar o Serviço (ou qualquer parte ou conteúdo do mesmo) sem notificação em qualquer momento.
                            
                            Não nos responsabilizados por você ou por qualquer terceiro por qualquer modificação, alteração de preço, suspensão ou descontinuação do Serviço.
                            
                            
                            SEÇÃO 5 - PRODUTOS OU SERVIÇOS (caso aplicável)
                            
                            Certos produtos ou serviços podem estar disponíveis exclusivamente online através do site. Tais produtos ou serviços podem ter quantidades limitadas e são sujeitos a apenas devolução ou troca, de acordo com nossa Política de devolução.
                            
                            Fizemos todo o esforço possível da forma mais precisa as cores e imagens dos nossos produtos que aparecem na loja. Não podemos garantir que a exibição de qualquer cor no monitor do seu computador será precisa.
                            
                            Reservamos o direito, mas não somos obrigados, a limitar as vendas de nossos produtos ou Serviços para qualquer pessoa, região geográfica ou jurisdição. Podemos exercer esse direito conforme o caso. Reservamos o direito de limitar as quantidades de quaisquer produtos ou serviços que oferecemos. Todas as descrições de produtos ou preços de produtos são sujeitos a alteração a qualquer momento sem notificação, a nosso critério exclusivo. Reservamos o direito de descontinuar qualquer produto a qualquer momento. Qualquer oferta feita por qualquer produto ou serviço nesse site é nula onde for proibido por lei.
                            
                            Não garantimos que a qualidade de quaisquer produtos, serviços, informações ou outros materiais comprados ou obtidos por você vão atender às suas expectativas, ou que quaisquer erros no Serviço serão corrigidos.
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                {{-- <label class="col-form-label"><strong>Termos de uso e Privacidade! Leia <a href="{{route('termos.privacidade')}}" target="_blank">AQUI</a> os nossos termos.</strong></label> --}}
                <label class="col-form-label"><strong>Termos de uso e Privacidade!</strong> Leia clicando <a data-toggle="modal" data-target="#exampleModalLong"><strong>AQUI</strong></a> os nossos termos. Ou em nossa página clicando <a href="{{route('termos.privacidade')}}" target="_blank"><strong>AQUI!</strong></a></label>
                <div >
                    <div class="form-check form-check-inline">
                        <input id="termo" type="checkbox" class="form-check-input" name="termo">
                        <label class="form-check-label" for="termo">Aceito os termos do contrato de licença</label>
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
