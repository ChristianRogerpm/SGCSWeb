<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadComiteCambio;
use App\EntidadUsuarioProyecto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClsControllerComiteCambio extends Controller
{
    public function fncMostrarComiteCambio($id)
    {
        $xGstringProyectosAsignado = $id;
        $xGstringUsuarioProyecto = EntidadUsuarioProyecto::where('PROid_proyecto',$id)
            ->select('USUPROid_usuarioproyecto','sgcsusutusuario.USUnombre_usuario','sgcsusutusuario.USUapellido_usuario')
            ->join('sgcsusutusuario','sgcsusupropusuarioproyecto.USUid_usuario','sgcsusutusuario.USUid_usuario')
            ->where('sgcsusupropusuarioproyecto.USUPROestado_usuarioproyecto','<>','2')
            ->get();

        $xGstringComiteCambio = DB::table('sgcsCOMCApComiteCambio')
            ->select('sgcsCOMCApComiteCambio.COMCAid_comitecambio','sgcsusutusuario.USUnombre_usuario','sgcsCOMCApComiteCambio.COMCAestado_comitecambio')
            ->join('sgcsusupropusuarioproyecto','sgcsCOMCApComiteCambio.USUPROid_usuarioproyecto','sgcsusupropusuarioproyecto.USUPROid_usuarioproyecto')
            ->join('sgcsusutusuario','sgcsusupropusuarioproyecto.USUid_usuario','sgcsusutusuario.USUid_usuario')
            ->where('sgcsusupropusuarioproyecto.PROid_proyecto',$id)
            ->where('sgcsCOMCApComiteCambio.COMCAestado_comitecambio','<>',2)
            ->where('sgcsusupropusuarioproyecto.USUPROestado_usuarioproyecto','<>',2)
            ->get();

        return view('JefeProyecto.FrmComiteCambio',compact('xGstringUsuarioProyecto','xGstringProyectosAsignado','xGstringComiteCambio'));
    }
    public function fncRegistrarComiteCambio(Request $request)
    {
        $USUPROid_usuarioproyecto = $request->get('USUPROid_usuarioproyecto');
        $COMCAestado_comitecambio = $request->get('COMCAestado_comitecambio');

        for ($i = 0; $i < count($USUPROid_usuarioproyecto); $i++) {
            $xPstringValidarComiteCambio = DB::table('sgcsCOMCApComiteCambio')
                ->where('USUPROid_usuarioproyecto', '=', $USUPROid_usuarioproyecto[$i])
                ->where('COMCAestado_comitecambio','<>',2)
                ->first();
            if ($xPstringValidarComiteCambio === null) {
                $xPstringComiteCambio = new EntidadComiteCambio;
                $xPstringComiteCambio->USUPROid_usuarioproyecto = $USUPROid_usuarioproyecto[$i];
                $xPstringComiteCambio->COMCAestado_comitecambio = $COMCAestado_comitecambio;
                $xPstringComiteCambio->save();
            } else {
                return back()->with('flash', 'Se ha encontrado registros existentes');
            }
        }

        return back()->with('flash', 'Se ha registrado Integrante(s) al Comite de Cambio satisfactoriamente');
    }
    public function fncRetirarComiteCambio($id)
    {
        DB::table('sgcscomcapcomitecambio')
            ->where('sgcscomcapcomitecambio.COMCAid_comitecambio', $id)
            ->update(['sgcscomcapcomitecambio.COMCAestado_comitecambio' => 2]);
        return back();
    }
}
