<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadEntregableProyecto;
use App\EntidadRelacionTareaProyecto;
use App\Http\Requests\ClsRequestRelacionTareaProyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClsControllerRelacionTareaProyecto extends Controller
{
    public function fncMostrarRelacionTareaProyecto($id)
    {
        $xGstringFaseEntregableProyecto = EntidadEntregableProyecto::where('PROid_proyecto',$id)
            ->select('sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAnombre_fase')
            ->join('sgcsfatfase','sgcsentrpropentregableproyecto.FAid_fase','sgcsfatfase.FAid_fase')
            ->groupBy('sgcsentrpropentregableproyecto.FAid_fase')
            ->get();

        $xGstringProyectosAsignado = $id;

        $xGstringRelacionTareaProyecto = DB::table('sgcsretaprelaciontareaproyecto as repro')
            ->select('repro.RETAid_relaciontarea', 'fa.FAnombre_fase', 'entre.ENTRnombre_entregable', 'tapro.TAnombre_tarea')
            ->join('sgcstaptareaproyecto as tapro','tapro.TAid_tarea' , 'repro.TAid_tarea1')
            ->join('sgcsentrpropentregableproyecto as entpro','entpro.ENTRPROid_entregableproyecto','tapro.ENTPROid_entregableproyecto')
            ->join('sgcsentrtentregable as entre','entre.ENTRid_entregable','entpro.ENTRid_entregable')
            ->join('sgcsfatfase as fa','fa.FAid_fase','entpro.FAid_fase')
            ->get();

        return view('JefeProyecto.ContenidoPestaña.FrmPestañaRelacionarTarea',
            compact('xGstringProyectosAsignado','xGstringFaseEntregableProyecto','xGstringRelacionTareaProyecto'));
    }

    public function fncRegistrarRelacionTareaProyecto(ClsRequestRelacionTareaProyecto $request)
    {
        $TAid_tarea1 = $request->get('TAid_tarea1');
        $TAid_tarea2 = $request->get('TAid_tarea2');

        $validar = EntidadRelacionTareaProyecto::where('TAid_tarea1',$TAid_tarea1)
        ->where('TAid_tarea2',$TAid_tarea2)
        ->first();

        if($TAid_tarea1 == $TAid_tarea2)
        {
            return back()->with('flash','No es posible relacionar Tareas iguales');
        }
        else
        {
            if($validar === null)
            {
                EntidadRelacionTareaProyecto::create($request->all());
                return back();
            }
            else
            {
                return back()->with('flash','Se ha encontrado registros existentes, vuelva a intentarlo');
            }
        }
    }

    public function fncRetirarRelacion($id)
    {
        $EntidadRelacion = EntidadRelacionTareaProyecto::find($id);

        $EntidadRelacion->delete();

        return back();
    }
}
