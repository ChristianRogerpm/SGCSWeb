<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "sgcsUSUtUsuario";
    protected $primaryKey = "USUid_usuario";
    protected $fillable = [
        'USUnombre_usuario',
        'USUapellido_usuario',
        'USUtelefono_usuario',
        'email',
        'USUdni_usuario',
        'password',
        'USUtipo_usuario'
    ];
}
