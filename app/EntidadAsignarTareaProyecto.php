<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadAsignarTareaProyecto extends Model
{
    protected $table = "sgcsatppasignartareaproyecto";
    protected $primaryKey = "ATPid_asignartareaproyecto";
    public $timestamps = false;
    protected $fillable =
        [
            'TAid_tarea',
            'USUPROid_usuarioproyecto',
            'FAid_fase',
            'ENTRPROid_entregableproyecto',
            'ATPfecha_inicio_tareaproyecto',
            'ATPfecha_fin_tareaproyecto',
            'ATPestado_tareaproyecto'
        ];
}
