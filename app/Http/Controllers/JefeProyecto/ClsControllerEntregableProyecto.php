<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadEntregable;
use App\EntidadEntregableProyecto;
use App\EntidadFase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use phpDocumentor\Reflection\Types\Integer;

class ClsControllerEntregableProyecto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncMostrarEntregablesProyecto($id)
    {
        $xGstringProyectosAsignado = $id;

        $xGstringMetodologiaProyecto = DB::table('sgcsprometpproyectometodologia')
        ->select('sgcsmettmetodologia.METid_metodologia','sgcsmettmetodologia.METnombre_metodologia','sgcsprometpproyectometodologia.PROid_proyecto')
        ->join('sgcsmettmetodologia', 'sgcsprometpproyectometodologia.METid_metodologia', '=', 'sgcsmettmetodologia.METid_metodologia')
        ->where('sgcsprometpproyectometodologia.PROid_proyecto',$id)
        ->first();

        $xGstringFaseProyecto = DB::table('sgcsfatfase')
            ->select('sgcsfatfase.FAid_fase','sgcsfatfase.FAnombre_fase')
            ->where('sgcsfatfase.METid_metodologia',$xGstringMetodologiaProyecto->METid_metodologia)
            ->get();

        $xGstringEntregableProyecto = EntidadEntregableProyecto::
              where('PROid_proyecto','=',$id)
            ->where('ENTRPROestado_entregable_proyecto','<>',2)
            ->get();

        return view('JefeProyecto.FrmEntregableProyecto',compact(
            'xGstringProyectosAsignado',
            'xGstringMetodologiaProyecto',
            'xGstringFaseProyecto',
            'xGstringEntregableProyecto'));

    }
    public function fncRegistrarEntregableProyecto(Request $request)
    {
        $ENTRid_entregable = $request->input('ENTRid_entregable');

        $PROid_proyecto = $request->input('PROid_proyecto');
        $METid_metodologia = $request->input('METid_metodologia');
        $ENTRPROestado_entregable_proyecto = $request->get('ENTRPROestado_entregable_proyecto');
        $FAid_fase = $request->get('FAid_fase');


        for ($x = 0; $x <count($ENTRid_entregable); $x++)
        {
            $xPstringValidarEntregableProyecto = DB::table('sgcsentrpropentregableproyecto')
                ->where('ENTRid_entregable', '=', $ENTRid_entregable[$x])
                ->where('PROid_proyecto', '=', $PROid_proyecto)
                ->where('ENTRPROestado_entregable_proyecto','<>',2)
                ->first();

            if($xPstringValidarEntregableProyecto === null)
            {
                $xPstringEntregableProyecto = new EntidadEntregableProyecto;
                $xPstringEntregableProyecto->PROid_proyecto = $PROid_proyecto;
                $xPstringEntregableProyecto->METid_metodologia = $METid_metodologia;
                $xPstringEntregableProyecto->FAid_fase = $FAid_fase;
                $xPstringEntregableProyecto->ENTRid_entregable = $ENTRid_entregable[$x];
                $xPstringEntregableProyecto->ENTRPROestado_entregable_proyecto = $ENTRPROestado_entregable_proyecto;
                $xPstringEntregableProyecto->save();
            }
            else
            {
                return back()->with('flash', 'Se ha encontrado registros existentes');
            }
        }
        return back()->with('flash', 'Se ha registrado Integrante(s) satisfactoriamente');



    }

    public function fncRetirarEntregableProyecto($ENTRPROid_entregableproyecto)
    {
        $update = EntidadEntregableProyecto::find($ENTRPROid_entregableproyecto);
        $update->ENTRPROestado_entregable_proyecto = 2;
        $update->save();
        return back();
    }

    public function fncCargarEntregableFase(Request $request)
    {
        $FAid_fase = $request->input('FAid_fase');
        $ss = EntidadEntregable::where('FAid_fase','=',$FAid_fase)
            ->get();
        return Response::json($ss);
    }
}
