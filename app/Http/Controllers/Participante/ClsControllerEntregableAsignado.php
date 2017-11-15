<?php

namespace App\Http\Controllers\Participante;

use App\EntidadEntregableRevision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClsControllerEntregableAsignado extends Controller
{
    public function fncMostrarEntregablesAsignados($id)
    {
        $xGstringEntregablesAsignado = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entpro.ENTRPROid_entregableproyecto','entre.ENTRid_entregable','pro.PROnombre_proyecto','fa.FAnombre_fase','entre.ENTRnombre_entregable')
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
            ->groupBy('entpro.ENTRPROid_entregableproyecto')
//            ->groupBy('atp.ATPestado_tareaproyecto')
            ->where('atp.ATPestado_tareaproyecto','<>',4)
            ->where('entpro.ENTRPROestado_entregable_proyecto','<>',3)
            ->get();

        $contandoFinalizados = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entre.ENTRid_entregable')
            ->selectRaw('count(entre.ENTRid_entregable) as finalizados')
            ->join('sgcstaptareaproyecto as tapro' , 'tapro.TAid_tarea', 'atp.TAid_tarea')
            ->join('sgcsentrpropentregableproyecto as entpro' , 'entpro.ENTRPROid_entregableproyecto', 'tapro.ENTPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre' , 'entre.ENTRid_entregable', 'entpro.ENTRid_entregable')
            ->where('atp.ATPestado_tareaproyecto', 2)
            ->groupBy('entre.ENTRid_entregable')
            ->get();

        $UsuariosResponsables = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entre.ENTRid_entregable','usu.USUnombre_usuario','usu.USUapellido_usuario'/*,'tapro.TAnombre_tarea'*/)
            ->join('sgcstaptareaproyecto as tapro' , 'tapro.TAid_tarea', 'atp.TAid_tarea')
            ->join('sgcsentrpropentregableproyecto as entpro' , 'entpro.ENTRPROid_entregableproyecto', 'tapro.ENTPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre' , 'entre.ENTRid_entregable', 'entpro.ENTRid_entregable')
            ->join('sgcsusupropusuarioproyecto as usupro' , 'usupro.USUPROid_usuarioproyecto', 'atp.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu' , 'usu.USUid_usuario', 'usupro.USUid_usuario')
            ->groupBy('entre.ENTRid_entregable')
            ->groupBy('usu.USUnombre_usuario')
            ->groupBy('usu.USUapellido_usuario')
//            ->groupBy('tapro.TAnombre_tarea')
            ->get();

        $TareasEntregable = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entre.ENTRid_entregable','tapro.TAnombre_tarea')
            ->join('sgcstaptareaproyecto as tapro' , 'tapro.TAid_tarea', 'atp.TAid_tarea')
            ->join('sgcsentrpropentregableproyecto as entpro' , 'entpro.ENTRPROid_entregableproyecto', 'tapro.ENTPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre' , 'entre.ENTRid_entregable', 'entpro.ENTRid_entregable')
            ->join('sgcsusupropusuarioproyecto as usupro' , 'usupro.USUPROid_usuarioproyecto', 'atp.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu' , 'usu.USUid_usuario', 'usupro.USUid_usuario')
            ->groupBy('entre.ENTRid_entregable')
            ->groupBy('usu.USUnombre_usuario')
            ->groupBy('usu.USUapellido_usuario')
            ->groupBy('tapro.TAnombre_tarea')
            ->get();

        return view('Participante.FrmEntregablesAsignados',compact('xGstringEntregablesAsignado','contandoFinalizados','UsuariosResponsables','TareasEntregable'));
    }

    public function fncGenerarRevisionEntregable(Request $request)
    {

        //Recibimos el ID de entregable proyecto
        $ENTRPROid_entregableproyecto = $request->input('ENTRPROid_entregableproyecto');

        //Registramos la revision en EntregableRevision

        EntidadEntregableRevision::create($request->all());

        //Como se genera una revision se cambia el estado del entregableproyecto a En Revision

        DB::table('sgcsentrpropentregableproyecto as entpro')
            ->where('entpro.ENTRPROid_entregableproyecto', $ENTRPROid_entregableproyecto)
            ->update(['entpro.ENTRPROestado_entregable_proyecto' => 3]);

        return back();
    }

    public function fncMostrarVersionesEntregables()
    {

    }

    public function fncMostrarDetalleVersionEntregable()
    {

    }
}
