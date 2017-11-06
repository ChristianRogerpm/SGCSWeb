<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadProyecto extends Model
{
    protected $table = "sgcsPROtProyecto";
    protected $primaryKey = "PROid_proyecto";
    public $timestamps = false;
    protected $fillable = [
        'USUid_usuario',
        'PROnombre_proyecto',
        'PROdescripcion_proyecto',
        'PROfecha_inicio_proyecto',
        'PROfecha_fin_proyecto',
        'PROestado_proyecto'
    ];

    public function fncRelacionUsuario()
    {
        return $this->belongsTo(User::class,'USUid_usuario');
    }
}
