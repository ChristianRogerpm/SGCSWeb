<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadFase extends Model
{
    protected $table = "sgcsFAtFase";
    protected $primaryKey = "FAid_fase";
    public $timestamps = false;
    protected $fillable = [
        'METid_metodologia',
        'FAnombre_fase',
        'FAdescripcion_fase',
        'FAestado_fase'
    ];

    public function fncRelacionMetodologia()
    {
        return $this->belongsTo(EntidadMetodologia::class,'METid_metodologia');
    }
}
