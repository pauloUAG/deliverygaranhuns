@extends('layouts.app')

@section('content')
@if ($message = Session::get('errors'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>ERRO NA EDIÇÃO!</strong> Corrija as informações marcadas abaixo e tente novamente.
    </div>
@endif
<div class="container ">
    <div class="row titulo col-md-12">
        <h1>Detalhes</h1>
    </div>

    <div class="col-md-12">
        <form id="formCadastro" method="POST" enctype="multipart/form-data" action="{{ route('estabelecimento.edit') }}">
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
                        @foreach($modalidades as $modalidade)
                            <option value="{{ $modalidade->id }}" @if($estabelecimento->modalidade->nome == $modalidade->nome) selected @endif>{{ $modalidade->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="name" class="col-form-label">Nome *</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $estabelecimento->user->name }}">

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
                    <input id="site" type="url" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ $estabelecimento->site }}">

                    @error('site')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="col-form-label" for="imagemCapa">Imagem de Capa (jpg ou png)</label>
                    @if(isset($estabelecimento->imagemCapa) && $estabelecimento->imagemCapa!="")
                      <img src="{{asset('storage/imagens/' . $estabelecimento->imagemCapa)}}" alt="...">
                    @else
                      Sem imagem
                    @endif
                    <input type="file" class="form-control-file" id="imagemCapa" name="imagemCapa" placeholder="Selecione um arquivo" />

                    @error('imagemcapa')
                    <span class="invalid-feedback" role="alert" style="display: block;">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="col-md-3">
                    <label class="col-form-label" for="imagemInterna">Imagem Interna  (jpg ou png)</label>
                    @if(isset($estabelecimento->imagemInterna) && $estabelecimento->imagemInterna!="")
                      <img height="145" src="{{asset('storage/imagens/' .$estabelecimento->imagemInterna)}}" alt="...">
                    @else
                      Colocar uma imagem que diz sem imagem
                    @endif
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
                    <textarea   id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" >{{ $estabelecimento->descricao }}</textarea>

                    @error('descricao')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-12">
                    <label class="col-form-label"><strong>Formas de Pagamento</strong></label>
                </div>
                <div class="col-md-12">
                    <div class="form-check form-check-inline">
                        <input   @if($estabelecimento->pagamentoDinheiro) checked @endif  type="checkbox" class="form-check-input" id="pagamentoDinheiro" name="pagamentoDinheiro">
                        <label class="form-check-label" for="pagamentoDinheiro">Dinheiro</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input   @if($estabelecimento->pagamentoTransferencia)) checked @endif type="checkbox" class="form-check-input" id="pagamentoTransferencia" name="pagamentoTransferencia">
                        <label class="form-check-label" for="pagamentoTransferencia">Transferência</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input   @if($estabelecimento->pagamentoCredito))  checked @endif type="checkbox" class="form-check-input" id="pagamentoCredito" name="pagamentoCredito">
                        <label class="form-check-label" for="pagamentoCredito">Cartão de Crédito</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input   @if($estabelecimento->pagamentoDebito)) checked @endif type="checkbox" class="form-check-input" id="pagamentoDebito" name="pagamentoDebito">
                        <label class="form-check-label" for="pagamentoDebito">Cartão de Débito</label>
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
                    <input   id="facebook" type="url" class="form-control" name="facebook" value="{{ $estabelecimento->facebook }}">
                </div>
                <div class="col-md-4">
                    <label for="instagram" class="col-form-label">Instagram</label>
                    <input   id="instagram" type="text" class="form-control" name="instagram" value="{{ $estabelecimento->instagram }}">
                </div>
                <div class="col-md-4">
                    <label for="twitter" class="col-form-label">Twitter</label>
                    <input   id="twitter" type="text" class="form-control" name="twitter" value="{{ $estabelecimento->twitter }}">
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

                      @foreach($estabelecimento->telefones as $key)
                          <div class='row align-items-end' >
                              <div class='col-md-4'>
                                  <label class='col-form-label'>Telefone</label>
                                  <input   type='text' class='form-control' name='telefone[]' value="{{ $key->numero }}" >
                              </div>
                              <div class='col-md-4'>
                                  <label class='col-form-label'>Operadora</label>
                                  <input   type='text' class='form-control' name='operadora[]' value="{{ $key->operadora }}" required autofocus>
                              </div>
                              <div class='col-md-3' >
                                  <input   type='checkbox' @if($key->zap) checked @endif class='form-check-input' name='zap[]' autofocus onclick='this.previousElementSibling.value=1-this.previousElementSibling.value; '>
                                  <label class='form-check-label'>Whatsapp</label>
                              </div>
                          </div>
                      @endforeach

                    </div>
                    <input type="button" onclick="adicionarTelefone()" class="btn btn-primary" id="addCoautor" style="width:100%;margin-top:10px" value="Novo Telefone"></input>
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
                    <label for="cep" class="col-form-label">CEP *</label>
                    <input name="cep"  value="{{$estabelecimento->endereco->cep}}" id="cep" type="text" class="form-control field__input a-field__input" placeholder="CEP" size="10" maxlength="9" >
                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="rua" class="col-form-label">{{ __('Rua') }}</label>
                    <input   value="{{$estabelecimento->endereco->rua}}" id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" name="rua" required >
                    @error('rua')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="numero" class="col-form-label">{{ __('Número') }}</label>
                    <input   value="{{$estabelecimento->endereco->numero}}" id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" autocomplete="numero">
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
                    <input   value="{{$estabelecimento->endereco->bairro}}" id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" >
                </div>
                <div class="col-md-4">
                    <label for="bairro" class="col-form-label">Cidade</label>
                    <input   readonly type="text" class="form-control" name="cidade" id="cidade" value="{{ $estabelecimento->endereco->cidade }}" />
                </div>
                <div class="col-md-4">
                    <label for="bairro" class="col-form-label">UF</label>
                    <input   readonly type="text" class="form-control" name="uf" id="uf" value="{{ $estabelecimento->endereco->uf }}" />
                </div>

            </div>
            <div class="form-group row mb-0" style="margin: 20px 0 20px 0">
                <div class="col-md-6">
                    <a class="btn btn-secondary botao-form" href="{{route('home')}}" style="width:100%">Cancelar Cadastro</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary botao-form" style="width:100%">
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
