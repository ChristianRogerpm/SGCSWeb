<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadMetodologia;
use App\EntidadProyecto;
use App\EntidadProyectoMetodologia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClsControllerInfoProyecto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncInfoProyecto($id)
    {
        $xGstringProyectoSeleccionado = EntidadProyecto::where('PROid_proyecto',$id)->get();
        $xGstringProyectosAsignado = $id;
        $xGstringMetodologia = EntidadMetodologia::all();
        $xGstringMetodologiaProyecto = EntidadProyectoMetodologia::where('PROid_proyecto',$id)->get();
        return view('JefeProyecto.FrmInfoProyecto',compact('xGstringProyectoSeleccionado','xGstringMetodologia','xGstringMetodologiaProyecto','xGstringProyectosAsignado'));
    }
    public function fncRegistrarMetodologiaProyecto(Request $request)
    {
        EntidadProyectoMetodologia::create($request->all());
        return back();
    }
}
