<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadEntregableProyecto extends Model
{
    protected $table = "sgcsENTRPROpEntregableProyecto";
    protected $primaryKey = "ENTRPROid_entregableproyecto";

    public $timestamps = false;

    protected $fillable =
        [
            'PROid_proyecto',
            'METid_metodologia',
            'FAid_fase',
            'ENTRid_entregable',
            'ENTRPROestado_entregable_proyecto'
        ];

    public function fncRelacionMetodologiaProyecto()
    {
        return $this->belongsTo(EntidadMetodologia::class,'METid_metodologia');
    }
    public function fncRelacionFaseProyecto()
    {
        return $this->belongsTo(EntidadFase::class,'FAid_fase');
    }
    public function fncRelacionEntregableProyecto()
    {
        return $this->belongsTo(EntidadEntregable::class,'ENTRid_entregable');
    }
    public function fncRelacionProyecto()
    {
        return $this->belongsTo(EntidadProyecto::class,'PROid_proyecto');
    }
}
