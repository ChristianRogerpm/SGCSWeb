<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadComiteCambio extends Model
{
    protected $table = "sgcsCOMCApComiteCambio";
    protected $primaryKey ="COMCAid_comitecambio";

    public $timestamps = false;

    protected $fillable =
        [
            'USUPROid_usuarioproyecto',
            'COMCAestado_comitecambio'
        ];
}
