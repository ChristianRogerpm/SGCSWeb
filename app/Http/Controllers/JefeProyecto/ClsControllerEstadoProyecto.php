<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadEntregableProyecto;
use App\EntidadProyectoMetodologia;
use App\EntidadTareaProyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClsControllerEstadoProyecto extends Controller
{
    public function fncMostrarEstadoProyecto($id)
    {
        $xGstringProyectosAsignado = $id;

        $xGstringProyectoMetodologia = EntidadProyectoMetodologia::where('PROid_proyecto',$id)
            ->select('sgcsfatfase.FAid_fase','sgcsfatfase.FAnombre_fase')
            ->join('sgcsmettmetodologia','sgcsprometpproyectometodologia.METid_metodologia','sgcsmettmetodologia.METid_metodologia')
            ->join('sgcsfatfase','sgcsmettmetodologia.METid_metodologia','sgcsfatfase.METid_metodologia')
            ->groupBy('sgcsfatfase.FAid_fase')
            ->get();

        $xGstringEntregableProyecto = DB::table('sgcsentrpropentregableproyecto as entpro')
            ->select('entpro.ENTRPROid_entregableproyecto','entpro.FAid_fase','entre.ENTRnombre_entregable')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable' , 'entpro.ENTRid_entregable')
            ->where('PROid_proyecto',$id)
            ->where('ENTRPROestado_entregable_proyecto','<>',2)
            ->get();

        $xGstringDatosEntregables = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('usu.USUnombre_usuario','usu.USUapellido_usuario','entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsentrpropentregableproyecto as entpro','atp.ENTRPROid_entregableproyecto' , 'entpro.ENTRPROid_entregableproyecto')
            ->join('sgcsusupropusuarioproyecto as usupro','usupro.USUPROid_usuarioproyecto' , 'atp.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu','usupro.USUid_usuario' , 'usu.USUid_usuario')
            ->join('sgcstaptareaproyecto as tapro','tapro.TAid_tarea' , 'atp.TAid_tarea')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable' , 'entpro.ENTRid_entregable')
            ->groupBy('entpro.ENTRPROid_entregableproyecto')
            ->groupBy('usu.USUnombre_usuario')
            ->groupBy('usu.USUapellido_usuario')
            ->get();

        $xGstringTareaFase = EntidadTareaProyecto::all();


//        select atp.ENTRPROid_entregableproyecto,tapro.TAnombre_tarea,usu.USUnombre_usuario,usu.USUapellido_usuario,atp.ATPfecha_inicio_tareaproyecto,atp.ATPfecha_fin_tareaproyecto,atp.ATPestado_tareaproyecto
//        from sgcsatppasignartareaproyecto as atp
//        inner join sgcstaptareaproyecto as tapro on atp.TAid_tarea = tapro.TAid_tarea
//        inner join sgcsusupropusuarioproyecto as usupro on atp.USUPROid_usuarioproyecto = usupro.USUPROid_usuarioproyecto
//        inner join sgcsusutusuario as usu on usupro.USUid_usuario = usu.USUid_usuario

        $xGstringTareaAsignadaFase = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('atp.ENTRPROid_entregableproyecto','tapro.TAnombre_tarea','usu.USUnombre_usuario','usu.USUapellido_usuario','atp.ATPfecha_inicio_tareaproyecto','atp.ATPfecha_fin_tareaproyecto','atp.ATPestado_tareaproyecto')
            ->join('sgcstaptareaproyecto as tapro','atp.TAid_tarea','tapro.TAid_tarea')
            ->join('sgcsusupropusuarioproyecto as usupro','atp.USUPROid_usuarioproyecto','usupro.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu','usupro.USUid_usuario','usu.USUid_usuario')
            ->get();

//        dd($xGstringTareaAsignadaFase);

        return view('JefeProyecto.FrmEstadoProyecto',
            compact('xGstringProyectosAsignado',
                'xGstringProyectoMetodologia',
                'xGstringEntregableProyecto',
                'xGstringDatosEntregables',
                'xGstringTareaFase',
                'xGstringTareaAsignadaFase'));
    }
}
