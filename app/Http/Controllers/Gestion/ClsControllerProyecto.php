<?php

namespace App\Http\Controllers\Gestion;

use App\EntidadProyecto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClsRequestProyecto;
use App\User;
use Illuminate\Http\Request;

class ClsControllerProyecto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncMostrarProyecto()
    {
        $xGstringUsuario = User::all();
        $xGstringProyecto = EntidadProyecto::all();
        return view('Gestion.FrmProyecto',compact('xGstringUsuario','xGstringProyecto'));
    }
    public function fncRegistrarProyecto(ClsRequestProyecto $clsRequestProyecto)
    {
        EntidadProyecto::create($clsRequestProyecto->all());
        return back();
    }
    public function fncEditarProyecto($id)
    {
        $xGstringEditarProyecto = EntidadProyecto::find($id);
        $xGstringUsuario = User::all();
        $xGstringProyecto = EntidadProyecto::all();
        return view('Gestion.FrmProyecto',compact('xGstringEditarProyecto','xGstringUsuario','xGstringProyecto'));
    }
    public function fncModificarProyecto(ClsRequestProyecto $clsRequestProyecto,$id)
    {
        EntidadProyecto::find($id)->update($clsRequestProyecto->all());
        return back();
    }
}
