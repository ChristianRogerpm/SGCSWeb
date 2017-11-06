<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadProyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClsControllerProyectosAsignados extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncMostrarProyectosAsignados($id)
    {
        $xGstringProyectosAsignado = EntidadProyecto::where('USUid_usuario',$id)->get();
        return view('JefeProyecto.FrmProyectosAsignados',compact('xGstringProyectosAsignado'));
    }
}
