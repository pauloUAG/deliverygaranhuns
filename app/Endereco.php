<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'rua', 'numero', 'bairro', 'cidade','uf', 'cep', 'bairro_id'
    ];

    public function bairro() {
        return $this->belongsTo("\App\Bairro");
    }
}
