<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AdminCidade extends Model
{
    use Notifiable;

    protected $table = "admin_cidade";

    protected $fillable = [
        'name', 'email', 'cidade_id', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cidade() {
        return $this->belongsTo("\App\Cidade");
    }
}
