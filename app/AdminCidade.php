<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminCidade extends Authenticatable
{
    use Notifiable;

    protected $guard = "admin_cidade";

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
