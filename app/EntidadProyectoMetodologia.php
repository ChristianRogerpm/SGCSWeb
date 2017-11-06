<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadProyectoMetodologia extends Model
{
    protected $table = "sgcsPROMETpProyectoMetodologia";
    protected $primaryKey = "PROMETid_proyectometodologia";
    public $timestamps = false;

    protected $fillable =
        [
            'PROid_proyecto',
            'METid_metodologia',
            'PROMETestado_proyectometodologia'
        ];

    public function fncRelacionMetodologia()
    {
        return $this->belongsTo(EntidadMetodologia::class,'METid_metodologia');
    }
}
