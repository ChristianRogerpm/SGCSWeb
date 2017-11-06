<?php

namespace App\Http\Controllers\Gestion;

use App\EntidadMetodologia;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClsRequestMetodologia;
use Illuminate\Http\Request;

class ClsControllerMetodologia extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncMostrarMetodologia()
    {
        $xGstringMetodologia = EntidadMetodologia::all();
        return view('Gestion.FrmMetodologia',compact('xGstringMetodologia'));
    }
    public function fncRegistrarMetodologia(ClsRequestMetodologia $requestMetodologia)
    {
        EntidadMetodologia::create($requestMetodologia->all());
        return back();
    }
    public function fncEditarMetodologia($id)
    {
        $xGstringEditMetodologia = EntidadMetodologia::find($id);
        $xGstringMetodologia = EntidadMetodologia::all();
        return view('Gestion.FrmMetodologia',compact('xGstringEditMetodologia','xGstringMetodologia'));
    }
    public function fncModificarMetodologia(ClsRequestMetodologia $requestMetodologia,$id)
    {
        EntidadMetodologia::find($id)->update($requestMetodologia->all());
        return back();
    }
}
