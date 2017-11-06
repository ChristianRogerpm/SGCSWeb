<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntidadMetodologia extends Model
{
    protected $table = "sgcsMETtMetodologia";
    protected $primaryKey = "METid_metodologia";
    public $timestamps = false;
    protected $fillable = [
        'METnombre_metodologia',
        'METdescripcion_metodologia',
        'METestado_metodologia'
    ];
}
