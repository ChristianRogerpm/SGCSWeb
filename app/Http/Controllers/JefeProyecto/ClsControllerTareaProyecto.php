<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadAsignarTareaProyecto;
use App\EntidadEntregableProyecto;
use App\EntidadTareaProyecto;
use App\EntidadUsuarioProyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ClsControllerTareaProyecto extends Controller
{
    public function fncMostrarTareaProyecto($id)
    {
        $xGstringProyectosAsignado = $id;

        //Obtener Fases de los Entregables seleccionados en la pestaña anterior

        $xGstringFaseEntregableProyecto = EntidadEntregableProyecto::where('PROid_proyecto',$id)
            ->select('sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAnombre_fase')
            ->join('sgcsfatfase','sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAid_fase')
            ->groupBy('sgcsentrpropentregableproyecto.FAid_fase')
            ->get();

        // Obtener Tareas registradas y relacionadas a sus tablas respectivas

        $xGstringTareaProyecto = DB::table('sgcstaptareaproyecto as tapro')
            ->select('tapro.TAid_tarea','fa.FAnombre_fase','entre.ENTRnombre_entregable','tapro.TAnombre_tarea','tapro.*')
            ->join('sgcsfatfase as fa','tapro.FAid_fase','fa.FAid_fase')
            ->join('sgcsentrpropentregableproyecto as entpro','tapro.ENTPROid_entregableproyecto','entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable','entpro.ENTRid_entregable')
            ->where('entpro.PROid_proyecto',$id)
            ->get();

        return view('JefeProyecto.FrmGestionarTarea',compact('xGstringProyectosAsignado','xGstringFaseEntregableProyecto','xGstringUsuarioProyecto','xGstringTareaProyecto','xGstringAsignarTareaProyecto'));
    }
    public function fncRegistrarTareaProyecto(Request $request)
    {
        EntidadTareaProyecto::create($request->all());
        return back()->with('Se ha registrado una tarea exitosamente');
    }
    public function fncEditarTareaProyecto($id)
    {
        $xGstringEditarTareaProyecto = EntidadTareaProyecto::find($id);

        $xObtenerIDProyecto = DB::table('sgcstaptareaproyecto as tapro')
            ->select('entpro.PROid_proyecto')
            ->join('sgcsentrpropentregableproyecto as entpro','entpro.ENTRPROid_entregableproyecto','tapro.ENTPROid_entregableproyecto')
            ->where('tapro.TAid_tarea',$id)
            ->first();


        $idproyecto = $xObtenerIDProyecto->PROid_proyecto;

        $xGstringProyectosAsignado = $idproyecto;

        $xGstringUsuarioProyecto = EntidadUsuarioProyecto::where('PROid_proyecto',$xGstringProyectosAsignado)
            ->select('USUPROid_usuarioproyecto','sgcsusutusuario.USUnombre_usuario','sgcsusutusuario.USUapellido_usuario')
            ->join('sgcsusutusuario','sgcsusupropusuarioproyecto.USUid_usuario','sgcsusutusuario.USUid_usuario')
            ->where('sgcsusupropusuarioproyecto.USUPROestado_usuarioproyecto','<>','2')
            ->get();

        $xGstringFaseEntregableProyecto = EntidadEntregableProyecto::where('PROid_proyecto',$xGstringProyectosAsignado)
            ->select('sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAnombre_fase')
            ->join('sgcsfatfase','sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAid_fase')
            ->groupBy('sgcsentrpropentregableproyecto.FAid_fase')
            ->get();

        //Obtener Fases de los Entregables seleccionados en la pestaña anterior

        $xGstringFaseEntregableProyecto = EntidadEntregableProyecto::where('PROid_proyecto',$xGstringProyectosAsignado)
            ->select('sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAnombre_fase')
            ->join('sgcsfatfase','sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAid_fase')
            ->groupBy('sgcsentrpropentregableproyecto.FAid_fase')
//            ->groupBy('sgcsfatfase.FAnombre_fase')
            ->get();

        // Obtener Tareas registradas y relacionadas a sus tablas respectivas

        $xGstringTareaProyecto = DB::table('sgcstaptareaproyecto as tapro')
            ->select('tapro.TAid_tarea','fa.FAnombre_fase','entre.ENTRnombre_entregable','tapro.TAnombre_tarea','tapro.*')
            ->join('sgcsfatfase as fa','tapro.FAid_fase','fa.FAid_fase')
            ->join('sgcsentrpropentregableproyecto as entpro','tapro.ENTPROid_entregableproyecto','entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable','entpro.ENTRid_entregable')
            ->where('entpro.PROid_proyecto',$xGstringProyectosAsignado)
            ->get();

        //Listar Tareas asignadas a miembros del equipo
        $xGstringAsignarTareaProyecto = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('atp.ATPid_asignartareaproyecto','fa.FAnombre_fase','entre.ENTRnombre_entregable','tapro.TAnombre_tarea','usu.USUnombre_usuario','atp.ATPfecha_inicio_tareaproyecto','atp.ATPfecha_fin_tareaproyecto','atp.ATPestado_tareaproyecto')
            ->join('sgcstaptareaproyecto as tapro','tapro.TAid_tarea','atp.TAid_tarea')
            ->join('sgcsusupropusuarioproyecto as usupro','atp.USUPROid_usuarioproyecto','usupro.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu','usupro.USUid_usuario','usu.USUid_usuario')
            ->join('sgcsfatfase as fa','fa.FAid_fase','atp.FAid_fase')
            ->join('sgcsentrpropentregableproyecto as entpro','atp.ENTRPROid_entregableproyecto','entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entpro.ENTRid_entregable','entre.ENTRid_entregable')
            ->where('entpro.PROid_proyecto',$xGstringProyectosAsignado)
            ->get();

//        $xGstringEditarEntregable = DB::table('sgcstaptareaproyecto as tapro')
//            ->select('entre.ENTRid_entregable','entre.ENTRnombre_entregable')
//            ->join('sgcsentrpropentregableproyecto as entpro','tapro.ENTPROid_entregableproyecto','entpro.ENTRPROid_entregableproyecto')
//            ->join('sgcsentrtentregable as entre','entpro.ENTRid_entregable','entre.ENTRid_entregable')
//            ->where('tapro.TAid_tarea',$id)
//            ->first();
        $xGstringEditarEntregable = DB::table('sgcstaptareaproyecto as tapro')
            ->select('entpro.ENTRPROid_entregableproyecto','entre.ENTRnombre_entregable')
            ->join('sgcsentrpropentregableproyecto as entpro','tapro.ENTPROid_entregableproyecto','entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entpro.ENTRid_entregable','entre.ENTRid_entregable')
            ->where('tapro.TAid_tarea',$id)
            ->first();

        return view('JefeProyecto.FrmGestionarTarea',compact('xGstringProyectosAsignado','xGstringFaseEntregableProyecto','xGstringUsuarioProyecto','xGstringTareaProyecto','xGstringAsignarTareaProyecto','xGstringEditarTareaProyecto','xGstringEditarEntregable'));

    }

    public function fncModificarTareaProyecto(Request $request, $id)
    {
        EntidadTareaProyecto::find($id)->update($request->all());
        return back();
    }

    public function fncCargarEntregableTareaProyecto(Request $request)
    {
        $FAid_fase = $request->input('FAid_fase');
        $PROid_proyecto = $request->input('Proyecto');

        //Obtener Entregables de acuerdo a la Fase elegida (Id_fase)
        $xGarrayEntregable = DB::table('sgcsentrpropentregableproyecto')
            ->select('sgcsentrpropentregableproyecto.ENTRPROid_entregableproyecto','sgcsentrtentregable.ENTRnombre_entregable')
            ->join('sgcsentrtentregable','sgcsentrpropentregableproyecto.ENTRid_entregable','sgcsentrtentregable.ENTRid_entregable')
            ->where('sgcsentrpropentregableproyecto.FAid_fase',$FAid_fase)
            ->where('sgcsentrpropentregableproyecto.PROid_proyecto',$PROid_proyecto)
            ->where('sgcsentrpropentregableproyecto.ENTRPROestado_entregable_proyecto','<>',2)
            ->get();
        return Response::json($xGarrayEntregable);
    }
    public function fncCargarTareaProyecto(Request $request)
    {
        $ENTPROid_entregableproyecto = $request->input('ENTPROid_entregableproyecto');

        // Obtener Tareas de acuerdo al Entregable elegido (Id_EntregableProyecto)
        $xGarrayTarea = DB::table('sgcstaptareaproyecto')
            ->select('sgcstaptareaproyecto.TAid_tarea','sgcstaptareaproyecto.TAnombre_tarea')
            ->where('sgcstaptareaproyecto.ENTPROid_entregableproyecto',$ENTPROid_entregableproyecto)
            ->get();
        return Response::json($xGarrayTarea);
    }
}
