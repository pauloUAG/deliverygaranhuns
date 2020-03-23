<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    protected $fillable = ["nome", "icone"];

    public function estabelecimento() {
        return $this->hasMany("\App\Estabelecimento");
    }
}
