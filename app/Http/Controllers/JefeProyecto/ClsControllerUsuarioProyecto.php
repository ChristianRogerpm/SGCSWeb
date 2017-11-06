<?php

namespace App\Http\Controllers\JefeProyecto;

use App\EntidadUsuarioProyecto;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClsControllerUsuarioProyecto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function fncEquipoProyecto($id)
    {
        $idusuario = Auth::user()->USUid_usuario;
        $xGstringUsuarioProyecto = EntidadUsuarioProyecto::where('PROid_proyecto', $id)
            ->where('USUPROestado_usuarioproyecto','<>',2)
            ->get();
        //User por denominación el Framework es tratado como ClsEntidadUsuario
        $xGstringUsuariosDisponibles = User::where('USUid_usuario', '<>', $idusuario)->get();
        $xGstringProyectosAsignado = $id;

        return view('JefeProyecto.FrmUsuarioProyecto', compact('xGstringProyectosAsignado', 'xGstringUsuariosDisponibles', 'xGstringUsuarioProyecto'));
    }

    public function fncRegistrarIntegrateEquipo(Request $request)
    {
        $USUid_usuario = $request->get('USUid_usuario');
        $PROid_proyecto = $request->get('PROid_proyecto');
        $USUPROestado_usuarioproyecto = $request->get('USUPROestado_usuarioproyecto');

        $xPintCantidadIntegrantes = count($USUid_usuario);

        for ($i = 0; $i < $xPintCantidadIntegrantes; $i++) {
            $xPstringValidarUsuario = DB::table('sgcsusupropusuarioproyecto')
                ->where('USUid_usuario', '=', $USUid_usuario[$i])
                ->where('PROid_proyecto', '=', $PROid_proyecto)
                ->where('USUPROestado_usuarioproyecto','<>',2)
                ->first();
            if ($xPstringValidarUsuario === null) {
                $xPstringUsuarioProyecto = new EntidadUsuarioProyecto;
                $xPstringUsuarioProyecto->USUid_usuario = $USUid_usuario[$i];
                $xPstringUsuarioProyecto->PROid_proyecto = $PROid_proyecto;
                $xPstringUsuarioProyecto->USUPROestado_usuarioproyecto = $USUPROestado_usuarioproyecto;
                $xPstringUsuarioProyecto->save();
            } else {
                //Mensajes de retorno a la Vista FrmIntegranteEquipo
                return back()->with('flash', 'Se ha encontrado registros existentes');
            }
        }

        //Mensajes de retorno a la Vista FrmIntegranteEquipo
        return back()->with('flash', 'Se ha registrado Integrante(s) satisfactoriamente');

    }

    public function fncRetirarUsuarioProyecto($USUPROid_usuarioproyecto)
    {
        DB::table('sgcsusupropusuarioproyecto')
            ->where('sgcsusupropusuarioproyecto.USUPROid_usuarioproyecto', $USUPROid_usuarioproyecto)
            ->update(['sgcsusupropusuarioproyecto.USUPROestado_usuarioproyecto' => 2]);
        return back();
    }
}
