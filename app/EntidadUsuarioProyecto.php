<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadUsuarioProyecto extends Model
{
    protected $table = 'sgcsUSUPROpUsuarioProyecto';
    protected $primaryKey = "USUPROid_usuarioproyecto";
    public $timestamps = false;
    protected $fillable =
        [
            'USUid_usuario',
            'PROid_proyecto',
            'USUPROestado_usuarioproyecto'
        ];

    public function fncRelacionUsuario()
    {
        return $this->belongsTo(User::class,'USUid_usuario');
    }
}
