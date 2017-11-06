<?php

namespace App\Http\Controllers\Gestion;

use App\EntidadFase;
use App\EntidadMetodologia;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClsRequestFase;
use Illuminate\Http\Request;

class ClsControllerFase extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncMostrarFase()
    {
        $xGstringFase = EntidadFase::all();
        $xGstringMetodologia = EntidadMetodologia::all();
        return view('Gestion.FrmFase',compact('xGstringFase','xGstringMetodologia'));
    }
    public function fncRegistrarFase(ClsRequestFase $clsRequestFase)
    {
        EntidadFase::create($clsRequestFase->all());
        return back();
    }
    public function fncEditarFase($id)
    {
        $xGstringEditFase = EntidadFase::findorfail($id);
        $xGstringFase = EntidadFase::all();
        $xGstringMetodologia = EntidadMetodologia::all();
        return view('Gestion.FrmFase',compact('xGstringMetodologia','xGstringFase','xGstringEditFase'));
    }
    public function fncModificarFase(ClsRequestFase $clsRequestFase, $id)
    {
        EntidadFase::find($id)->update($clsRequestFase->all());
        return back();
    }
}
