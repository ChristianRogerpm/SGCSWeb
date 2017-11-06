<?php

namespace App\Http\Controllers\Gestion;

use App\EntidadEntregable;
use App\EntidadFase;
use App\EntidadMetodologia;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClsRequestEntregable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ClsControllerEntregable extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncMostrarEntregable()
    {
        $xGstringMetodologia = EntidadMetodologia::all();
        $xGstringEntregable = EntidadEntregable::all();
        return view('Gestion.FrmEntregable',compact('xGstringMetodologia','xGstringEntregable'));
    }
    public function fncRegistrarEntregable(ClsRequestEntregable $clsRequestEntregable)
    {
        EntidadEntregable::create($clsRequestEntregable->all());
        return back();
    }
    public function fncEditarEntregable($id)
    {
        $xstringEditEntregable = EntidadEntregable::find($id);
        $xGstringEntregable = EntidadEntregable::all();
        return view('Gestion.FrmEntregable',compact('xstringEditEntregable','xGstringEntregable'));

    }
    public function fncModificarEntregable(ClsRequestEntregable $clsRequestEntregable,$id)
    {
        EntidadEntregable::find($id)->update($clsRequestEntregable->all());
        return back();
    }
    public function fncFaseMetodologia(Request $request)
    {
        $METid_metodologia = $request->input('METid_metodologia');
        $ss = EntidadFase::where('METid_metodologia','=',$METid_metodologia)->get();
        return Response::json($ss);
    }
}
