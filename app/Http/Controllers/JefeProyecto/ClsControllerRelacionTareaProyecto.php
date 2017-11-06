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
//            ->groupBy('sgcsfatfase.FAnombre_fase')
            ->get();

        $xGstringProyectosAsignado = $id;
        return view('JefeProyecto.ContenidoPestaña.FrmPestañaRelacionarTarea',
            compact('xGstringProyectosAsignado','xGstringFaseEntregableProyecto'));
    }

    public function fncRegistrarRelacionTareaProyecto(ClsRequestRelacionTareaProyecto $request)
    {
        $TAid_tarea1 = $request->get('TAid_tarea1');
        $TAid_tarea2 = $request->get('TAid_tarea2');

        $xGstringValidarTarea = DB::table('sgcsretaprelaciontareaproyecto')
            ->where('TAid_tarea1','=',$TAid_tarea1)
            ->where('TAid_tarea2','=',$TAid_tarea2)
            ->first();

        $validar = EntidadRelacionTareaProyecto::where('TAid_tarea1',$TAid_tarea1)
        ->where('TAid_tarea2',$TAid_tarea2)
        ->first();

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
