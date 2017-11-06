<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadRelacionTareaProyecto extends Model
{
    protected $table = "sgcsretaprelaciontareaproyecto";
    protected $primaryKey = "RETAid_relaciontarea";
    public $timestamps = false;

    protected $fillable = [
        'TAid_tarea1',
        'TAid_tarea2'
    ];

}
