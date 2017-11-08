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


//        select atp.ATPid_asignartareaproyecto,pro.PROnombre_proyecto,fa.FAnombre_fase,entre.ENTRnombre_entregable,atp.ATPfecha_inicio_tareaproyecto,atp.ATPfecha_fin_tareaproyecto,atp.ATPestado_tareaproyecto
//from sgcsatppasignartareaproyecto as atp
//inner join sgcsusupropusuarioproyecto as usupro on usupro.USUPROid_usuarioproyecto = atp.USUPROid_usuarioproyecto
//inner join sgcsusutusuario as usu on usu.USUid_usuario = usupro.USUid_usuario
//inner join sgcsprotproyecto as pro on pro.PROid_proyecto = usupro.PROid_proyecto
//inner join sgcsfatfase as fa on fa.FAid_fase = atp.FAid_fase
//inner join sgcsentrpropentregableproyecto as entpro on entpro.ENTRPROid_entregableproyecto = atp.ENTRPROid_entregableproyecto
//inner join sgcsentrtentregable as entre on entre.ENTRid_entregable = entpro.ENTRid_entregable
//where usupro.USUid_usuario = 2
//    ;



        return view('JefeProyecto.FrmProyectosAsignados',compact('xGstringProyectosAsignado'));
    }
}
