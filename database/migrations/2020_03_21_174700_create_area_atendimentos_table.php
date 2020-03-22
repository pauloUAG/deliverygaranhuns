<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_atendimentos', function (Blueprint $table) {
            $table->id();
            $table->decimal("frete");
            $table->bigInteger("estabelecimento_id");
            $table->bigInteger("bairro_id");

            $table->foreign("bairro_id")->references("id")->on("bairros");
            $table->foreign("estabelecimento_id")->references("id")->on("estabelecimentos");
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
        Schema::dropIfExists('area_atendimentos');
    }
}
