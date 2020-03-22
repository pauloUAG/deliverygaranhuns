<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {
            $table->id();
            $table->string("descricao")->nullable();
            $table->string("imagemCapa")->nullable();
            $table->string("imagemInterna")->nullable();
            $table->string("site")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("facebook")->nullable();
            $table->boolean("pagamentoDinheiro")->default(false);
            $table->boolean("pagamentoTransferencia")->default(false);
            $table->boolean("pagamentoCredito")->default(false);
            $table->boolean("pagamentoDebito")->default(false);

            $table->bigInteger("endereco_id")->nullable();
            $table->foreign("endereco_id")->references("id")->on("enderecos");

            $table->bigInteger("user_id")->nullable();
            $table->foreign("user_id")->references("id")->on("users");

            $table->bigInteger("modalidade_id")->nullable();
            $table->foreign("modalidade_id")->references("id")->on("modalidades");

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estabelecimentos');
    }
}
