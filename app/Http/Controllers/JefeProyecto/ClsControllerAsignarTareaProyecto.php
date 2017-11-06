<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadAsignarTareaProyecto;
use App\EntidadEntregableProyecto;
use App\EntidadUsuarioProyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ClsControllerAsignarTareaProyecto extends Controller
{
    public function fncMostrarAsignarTareaProyecto($id)
    {
        $xGstringProyectosAsignado = $id;

        $xGstringUsuarioProyecto = EntidadUsuarioProyecto::where('PROid_proyecto',$id)
            ->select('USUPROid_usuarioproyecto','sgcsusutusuario.USUnombre_usuario','sgcsusutusuario.USUapellido_usuario')
            ->join('sgcsusutusuario','sgcsusupropusuarioproyecto.USUid_usuario','sgcsusutusuario.USUid_usuario')
            ->where('sgcsusupropusuarioproyecto.USUPROestado_usuarioproyecto','<>','2')
            ->get();

        //Obtener Fases de los Entregables seleccionados en la pestaña anterior

        $xGstringFaseEntregableProyecto = EntidadEntregableProyecto::where('PROid_proyecto',$id)
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
            ->where('entpro.PROid_proyecto',$id)
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
            ->where('entpro.PROid_proyecto',$id)
            ->get();

        return view('JefeProyecto.ContenidoPestaña.FrmPestañaAsignarTarea',compact('xGstringProyectosAsignado','xGstringFaseEntregableProyecto','xGstringUsuarioProyecto','xGstringTareaProyecto','xGstringAsignarTareaProyecto'));
    }


    public function fncEditarAsignarTarea($id)
    {
        $xGstringEditarAsignarTareaProyecto = EntidadAsignarTareaProyecto::findorfail($id);

        $xObtenerIDProyecto = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entpro.PROid_proyecto')
            ->join('sgcstaptareaproyecto as tapro','tapro.TAid_tarea', 'atp.TAid_tarea')
            ->join('sgcsentrpropentregableproyecto as entpro','entpro.ENTRPROid_entregableproyecto','tapro.ENTPROid_entregableproyecto')
            ->where('atp.ATPid_asignartareaproyecto',$id)
            ->first();

        $xGstringProyectosAsignado = $xObtenerIDProyecto->PROid_proyecto;

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

        $xGstringTareaProyecto = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('atp.TAid_tarea','tapro.TAnombre_tarea')
            ->join('sgcstaptareaproyecto as tapro','atp.TAid_tarea' , 'tapro.TAid_tarea')
            ->where('atp.ATPid_asignartareaproyecto',$id)
            ->get();

        $xGstringEntregableTareaProyecto = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('entpro.ENTRid_entregable','entre.ENTRnombre_entregable')
            ->join('sgcsentrpropentregableproyecto as entpro','atp.ENTRPROid_entregableproyecto' , 'entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable' , 'entpro.ENTRid_entregable')
            ->where('atp.ATPid_asignartareaproyecto',$id)
            ->get();

//        dd($xGstringEditarAsignarTareaProyecto);

//        dd($var);

        return view('JefeProyecto.ContenidoPestaña.FrmPestañaAsignarTarea',
            compact('xGstringProyectosAsignado',
                'xGstringEditarAsignarTareaProyecto',
                'xGstringAsignarTareaProyecto',
                'xGstringFaseEntregableProyecto',
                'xGstringEntregableTareaProyecto',
                'xGstringUsuarioProyecto',
                'xGstringTareaProyecto'));
    }
    public function fncModificarAsignarTarea(Request $request,$id)
    {
        EntidadAsignarTareaProyecto::find($id)->update($request->all());
        return back();
    }

    public function fncAsignarTarea(Request $request)
    {
        EntidadAsignarTareaProyecto::create($request->all());
        return back();
    }
}
