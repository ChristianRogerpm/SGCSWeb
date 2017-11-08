<?php

namespace App\Http\Controllers\Participante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClsControllerEntregableAsignado extends Controller
{
    public function fncMostrarEntregablesAsignados($id)
    {
        $xGstringEntregablesAsignado = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entre.ENTRid_entregable','pro.PROnombre_proyecto','fa.FAnombre_fase','entre.ENTRnombre_entregable','atp.ATPestado_tareaproyecto')
            ->join('sgcsusupropusuarioproyecto as usupro','usupro.USUPROid_usuarioproyecto','atp.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu','usu.USUid_usuario','usupro.USUid_usuario')
            ->join('sgcsprotproyecto as pro','pro.PROid_proyecto','usupro.PROid_proyecto')
            ->join('sgcsfatfase as fa','fa.FAid_fase','atp.FAid_fase')
            ->join('sgcsentrpropentregableproyecto as entpro','entpro.ENTRPROid_entregableproyecto','atp.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable','entpro.ENTRid_entregable')
            ->where('usupro.USUid_usuario',$id)
            ->groupBy('entre.ENTRid_entregable')
            ->groupBy('pro.PROnombre_proyecto')
            ->groupBy('fa.FAnombre_fase')
            ->groupBy('entre.ENTRnombre_entregable')
            ->groupBy('atp.ATPestado_tareaproyecto')
            ->get();

        return view('Participante.FrmEntregablesAsignados',compact('xGstringEntregablesAsignado'));
    }

    public function fncGenerarRevisionEntregable()
    {

    }

    public function fncMostrarVersionesEntregables()
    {

    }

    public function fncMostrarDetalleVersionEntregable()
    {

    }
}
