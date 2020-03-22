<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    protected $fillable = [
        "descricao", "imagemCapa", "imagemInterna",
        "site", "pagamentoDinheiro", "pagamentoTransferencia",
        "instagram", "twitter", "facebook",
        "pagamentoCredito", "pagamentoDebito", "user_id", "endereco_id", "modalidade_id"
    ];

    public function endereco() {
        return $this->belongsTo("\App\Endereco");
    }

    public function user() {
        return $this->belongsTo("\App\User");
    }

    public function telefones() {
        return $this->hasMany("\App\Telefone");
    }

}
