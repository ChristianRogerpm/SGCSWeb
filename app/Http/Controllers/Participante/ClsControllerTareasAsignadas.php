<?php

namespace App\Http\Controllers\Participante;

use App\EntidadTareaRevision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClsControllerTareasAsignadas extends Controller
{
    public function fncMostrarTareasAsignadas($id)
    {

        $xGstringTareasAsignadas = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('atp.ATPid_asignartareaproyecto','tapro.TAnombre_tarea','atp.ATPfecha_inicio_tareaproyecto','atp.ATPfecha_fin_tareaproyecto','atp.ATPestado_tareaproyecto','entre.ENTRnombre_entregable')
            ->join('sgcsentrpropentregableproyecto as entpro','entpro.ENTRPROid_entregableproyecto','atp.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable','entpro.ENTRid_entregable')
            ->join('sgcstaptareaproyecto as tapro','tapro.TAid_tarea','atp.TAid_tarea')
            ->join('sgcsusupropusuarioproyecto as usupro' , 'usupro.USUPROid_usuarioproyecto', 'atp.USUPROid_usuarioproyecto')
            ->where('entre.ENTRid_entregable',$id)
            ->where('usupro.USUid_usuario',Auth::user()->USUid_usuario)
            ->get();

        $xGstringDetalleTareasAsignada = DB::table('sgcsatppasignartareaproyecto as atp')
            ->select('atp.ATPid_asignartareaproyecto','pro.PROnombre_proyecto','met.METnombre_metodologia','fa.FAnombre_fase','entre.ENTRnombre_entregable','tapro.TAnombre_tarea','tapro.TAdescripcion_tarea','atp.ATPestado_tareaproyecto')
            ->join('sgcsusupropusuarioproyecto as usupro','usupro.USUPROid_usuarioproyecto','atp.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario as usu' , 'usu.USUid_usuario' , 'usupro.USUid_usuario')
            ->join('sgcsprotproyecto as pro' , 'pro.PROid_proyecto' ,'usupro.PROid_proyecto')
            ->join('sgcsfatfase as fa' , 'fa.FAid_fase', 'atp.FAid_fase')
            ->join('sgcsentrpropentregableproyecto as entpro' , 'entpro.ENTRPROid_entregableproyecto', 'atp.ENTRPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre' , 'entre.ENTRid_entregable' ,'entpro.ENTRid_entregable')
            ->join('sgcsprometpproyectometodologia as promet' , 'promet.PROid_proyecto' , 'pro.PROid_proyecto')
            ->join('sgcsmettmetodologia as met' , 'met.METid_metodologia' , 'promet.METid_metodologia')
            ->join('sgcstaptareaproyecto as tapro' , 'tapro.TAid_tarea' , 'atp.TAid_tarea')
            ->get();

        return view('Participante.FrmTareasAsignadas',compact('xGstringTareasAsignadas','xGstringDetalleTareasAsignada'));
    }

    public function fncGenerarRevisionTareaAsignada(Request $request)
    {
        $ATPid_asignartareaproyecto = $request->input('ATPid_asignartareaproyecto');

        EntidadTareaRevision::create($request->all());

        DB::table('sgcsatppasignartareaproyecto as atp')
            ->where('atp.ATPid_asignartareaproyecto', $ATPid_asignartareaproyecto)
            ->update(['atp.ATPestado_tareaproyecto' => 4]);

        return back()->with('flash','Se ha generado una revision');

    }

    public function fncMostrarVersionesTareaAsignada($id)
    {

        $xGstringVersionesTarea = DB::table('sgcstaveptareaversion as tave')
            ->select('tave.TAVEid_tareaversion','tave.TAVEnumeroversion','tave.TAVEenlace_tareaversion','tave.TAVEfecha_emitida_tareaversion','tave.TAVEestado_tareaversion')
            ->join('sgcstareptarearevision as tare','tare.TAREid_tarearevision','tave.TAREid_revision')
            ->join('sgcsatppasignartareaproyecto as atp','atp.ATPid_asignartareaproyecto','tare.ATPid_asignartareaproyecto')
            ->where('atp.ATPid_asignartareaproyecto',$id)
            ->get();

//        dd($xGstringVersionesTarea);

        return view('Participante.FrmTareaVersion',compact('xGstringVersionesTarea'));
    }

    public function fncMostrarDetalleVersionTareaAsignada()
    {

    }
}
