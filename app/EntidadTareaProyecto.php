<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadTareaProyecto extends Model
{
    protected $table = "sgcsTApTareaProyecto";
    protected $primaryKey = "TAid_tarea";
    public $timestamps = false;

    protected $fillable =
        [
            'TAnombre_tarea',
            'TAdescripcion_tarea',
            'TAestado_tarea',
            'FAid_fase',
            'ENTPROid_entregableproyecto'
        ];
}
