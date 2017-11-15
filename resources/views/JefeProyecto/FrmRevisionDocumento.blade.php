@extends('layouts.template')
@section('content')
    <row>
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Planificación de Proyecto </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-custom ">
                        <ul class="nav nav-tabs ">
                            <li >
                                <a href="{{route('InfoProyecto',$xGstringProyectosAsignado)}}"> Proyecto </a>
                            </li>
                            <li>
                                <a href="{{route('EquipoProyecto',$xGstringProyectosAsignado)}}"> Equipo </a>
                            </li>
                            <li>
                                <a href="{{route('EntregableProyecto',$xGstringProyectosAsignado)}}"> Entregables </a>
                            </li>
                            <li>
                                <a href="{{route('GestionarTareaProyecto',$xGstringProyectosAsignado)}}"> Tareas </a>
                            </li>
                            <li>
                                <a href="{{route('ComiteCambio',$xGstringProyectosAsignado)}}"> Comite de Cambio </a>
                            </li>
                            <li>
                                <a href="{{route('EstadoProyecto',$xGstringProyectosAsignado)}}"> Estado de Proyecto </a>
                            </li>
                            <li class="active">
                                <a href="{{route('RevisionDocumento',$xGstringProyectosAsignado)}}"> Revision Documento </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption font-light">
                                                <i class="icon-settings font-light"></i>
                                                <span class="caption-subject bold uppercase">Lista de Tareas a Revisar</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                <tr>
                                                    <th class="all">Nombre</th>
                                                    <th class="min-tablet">Entregable</th>
                                                    <th class="min-tablet">Fecha Emitida</th>
                                                    <th class="min-tablet">Responsable</th>
                                                    <th class="min-tablet">Estado</th>
                                                    <th class="all">Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($xGstringDocumentoRevisar as $xGstringDocumentoRevisarr)
                                                    <tr>
                                                        <td>{{$xGstringDocumentoRevisarr->TAnombre_tarea}}</td>
                                                        <td>{{$xGstringDocumentoRevisarr->ENTRnombre_entregable}}</td>
                                                        <td>{{$xGstringDocumentoRevisarr->TAREfecha_emitida_tarearevision}}</td>
                                                        <td>{{$xGstringDocumentoRevisarr->USUnombre_usuario}} {{$xGstringDocumentoRevisarr->USUapellido_usuario}}</td>
                                                        <td>
                                                            @if($xGstringDocumentoRevisarr->TAREestado_tarearevision == 1)
                                                                <span class="label label-sm label-default">EN REVISION</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group pull-right">
                                                                <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#generate{{$xGstringDocumentoRevisarr->TAREid_tarearevision}}">
                                                                            <i class="fa fa-times"></i>Generar Revision</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('JefeProyecto.Modals.FrmModalRevision')
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption font-light">
                                                <i class="icon-settings font-light"></i>
                                                <span class="caption-subject bold uppercase">Lista de Entregables a Revisar</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                <tr>
                                                    <th class="all">Nombre</th>
                                                    <th class="min-tablet">Responsable(s)</th>
                                                    <th class="min-tablet">Estado</th>
                                                    <th class="all">Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($xGstringEntregableRevisar as $EntregableRevisar)
                                                    <tr>
                                                        <td>{{$EntregableRevisar->ENTRnombre_entregable}}</td>
                                                        <td>
                                                            <?php
                                                            $Responsables = DB::table('sgcsatppasignartareaproyecto as atp')
                                                                ->select('usu.USUnombre_usuario','usu.USUapellido_usuario')
                                                                ->join('sgcsusupropusuarioproyecto as usupro', 'usupro.USUPROid_usuarioproyecto','atp.USUPROid_usuarioproyecto')
                                                                ->join('sgcsusutusuario as usu' , 'usu.USUid_usuario', 'usupro.USUid_usuario')
                                                                ->where('atp.ENTRPROid_entregableproyecto',$EntregableRevisar->ENTRPROid_entregableproyecto)
                                                                ->groupBy('usu.USUnombre_usuario')
                                                                ->groupBy('usu.USUapellido_usuario')
                                                                ->get();
                                                            ?>
                                                            @foreach($Responsables as $res)
                                                                    <span class="label label-sm label-primary">{{$res->USUnombre_usuario}} {{$res->USUapellido_usuario}}</span>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @if($EntregableRevisar->ENTRREVestado_entregablerevision == 1)
                                                                <span class="label label-sm label-default">EN REVISION</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="btn-group pull-right">
                                                                <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                                <ul class="dropdown-menu pull-right">
                                                                    <li>
                                                                        <a data-toggle="modal" href="#generate2{{$EntregableRevisar->ENTRREVid_entregablerevision}}">
                                                                            <i class="fa fa-times"></i>Generar Revision</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @include('JefeProyecto.Modals.FrmModalRevisionEntregable')
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </row>
@endsection