@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row titulo col-md-12">
        <h1>Cadastro</h1>
    </div>

    <div class="col-md-12">
        <form method="POST" enctype="multipart/form-data" action="{{ route('estabelecimento.save') }}">
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
                    <textarea id="descricao" class="form-control @error('descricao') is-invalid @enderror" name="descricao" required autocomplete="name" autofocus>{{ old('descricao') }}</textarea>

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
                        <input @if(old('pagamentoDinheiro')) checked @endif  type="checkbox" class="form-check-input" id="pagamentoDinheiro" name="pagamentoDinheiro">
                        <label class="form-check-label" for="pagamentoDinheiro">Dinheiro</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input @if(old('pagamentoTransferencia')) checked @endif type="checkbox" class="form-check-input" id="pagamentoTransferencia" name="pagamentoTransferencia">
                        <label class="form-check-label" for="pagamentoTransferencia">Transferência</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input @if(old('pagamentoCredito'))  checked @endif type="checkbox" class="form-check-input" id="pagamentoCredito" name="pagamentoCredito">
                        <label class="form-check-label" for="pagamentoCredito">Cartão de Crédito</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input @if(old('pagamentoDebito')) checked @endif type="checkbox" class="form-check-input" id="pagamentoDebito" name="pagamentoDebito">
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
                    <input id="facebook" type="url" class="form-control" name="facebook" value="{{ old('facebook') }}" autocomplete="facebook">
                </div>
                <div class="col-md-4">
                    <label for="instagram" class="col-form-label">Instagram</label>
                    <input id="instagram" type="text" class="form-control" name="instagram" value="{{ old('instagram') }}" autocomplete="instagram">
                </div>
                <div class="col-md-4">
                    <label for="twitter" class="col-form-label">Twitter</label>
                    <input id="twitter" type="text" class="form-control" name="twitter" value="{{ old('twitter') }}" autocomplete="twitter">
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
                                    <div class='col-md-4'>
                                        <label class='col-form-label'>Operadora *</label>
                                        <input type='text' class='form-control' name='operadora[]' value="{{ old('operadora')[$i] }}" required autofocus>
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
                                <div class='col-md-4'>
                                    <label class='col-form-label'>Operadora *</label>
                                    <input type='text' class='form-control' name='operadora[]' required autofocus>
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
                    <label for="password" class="col-form-label">Senha *</label>
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
                    <label for="cep" class="col-form-label">CEP *</label>
                    <input value="{{old('cep')}}" onblur="pesquisacep(this.value);" id="cep" type="text" required autocomplete="cep" name="cep" autofocus class="form-control field__input a-field__input" placeholder="CEP" size="10" maxlength="9" >
                    @error('cep')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="rua" class="col-form-label">{{ __('Rua') }}</label>
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
                    <label for="bairro" class="col-form-label">Cidade</label>
                    <input readonly type="text" class="form-control" name="cidade" id="cidade" value="{{ old('cidade') }}" />
                </div>
                <div class="col-md-4">
                    <label for="bairro" class="col-form-label">UF</label>
                    <input readonly type="text" class="form-control" name="uf" id="uf" value="{{ old('uf') }}" />
                </div>

            </div>
            <div class="form-group row mb-0" style="margin: 20px 0 20px 0">
                <div class="col-md-6">
                    <a class="btn btn-secondary botao-form" href="{{route('inicio')}}" style="width:100%">Cancelar Cadastro</a>
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
                "                                <input type='text' class='celular form-control' name='telefone[]' required autofocus>\n" +
                "                            </div>\n" +
                "                            <div class='col-md-4'>\n" +
                "                                <label class='col-form-label'>Operadora</label>\n" +
                "                                <input type='text' class='form-control' name='operadora[]' required autofocus>\n" +
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




    </script>



@endsection
