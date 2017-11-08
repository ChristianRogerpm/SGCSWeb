<?php

namespace App\Http\Controllers\Participante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClsControllerTareasAsignadas extends Controller
{
    public function fncMostrarTareasAsignadas($id)
    {

//        echo 'asdasd';
        $xGstringTareasAsignadas = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('atp.ATPid_asignartareaproyecto','tapro.TAnombre_tarea','atp.ATPfecha_inicio_tareaproyecto','atp.ATPfecha_fin_tareaproyecto','atp.ATPestado_tareaproyecto','entre.ENTRnombre_entregable')
            ->join('sgcsentrpropentregableproyecto as entpro','entpro.ENTRPROid_entregableproyecto','atp.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable','entpro.ENTRid_entregable')
            ->join('sgcstaptareaproyecto as tapro','tapro.TAid_tarea','atp.TAid_tarea')
            ->where('entre.ENTRid_entregable',$id)
            ->get();

        return view('Participante.FrmTareasAsignadas',compact('xGstringTareasAsignadas'));
    }

    public function fncGenerarRevisionTareaAsignada()
    {

    }

    public function fncMostrarVersionesTareaAsignada()
    {

    }

    public function fncMostrarDetalleVersionTareaAsignada()
    {

    }
}
