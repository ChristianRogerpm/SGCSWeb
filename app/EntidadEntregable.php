<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadEntregable extends Model
{
    protected $table = "sgcsENTRtEntregable";
    protected $primaryKey = "ENTRid_entregable";
    public $timestamps = false;
    protected $fillable = [
        'ENTRid_entregable',
        'METid_metodologia',
        'FAid_fase',
        'ENTRnombre_entregable',
        'ENTRdescripcion_entregable',
        'ENTRestado_entregable'
    ];

    public function fncRelacionMetodologia()
    {
        return $this->belongsTo(EntidadMetodologia::class,'METid_metodologia');
    }
    public function fncRelacionFase()
    {
        return $this->belongsTo(EntidadFase::class,'FAid_fase');
    }
}
