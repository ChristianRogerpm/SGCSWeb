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
                            <li class="active">
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
                            <li>
                                <a href="{{route('RevisionDocumento',$xGstringProyectosAsignado)}}"> Revision Documento </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="InfoProyecto">
                                @include('JefeProyecto.ContenidoPestaña.FrmPestañaEntregableProyecto')
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption font-light">
                                                <i class="icon-settings font-light"></i>
                                                <span class="caption-subject bold uppercase">Lista de Proyectos</span>
                                            </div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                                <thead>
                                                <tr>
                                                    <th class="all">Entregable</th>
                                                    <th class="min-tablet">Fase</th>
                                                    <th class="min-tablet">Estado</th>
                                                    <th class="all">Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($xGstringEntregableProyecto as $xGstringEntregableProyectos)
                                                <tr>
                                                    <td>{{$xGstringEntregableProyectos->fncRelacionEntregableProyecto->ENTRnombre_entregable}}</td>
                                                    <td>{{$xGstringEntregableProyectos->fncRelacionFaseProyecto->FAnombre_fase}}</td>
                                                    <td>
                                                        @if($xGstringEntregableProyectos->ENTRPROestado_entregable_proyecto == 1)
                                                            <span class="label label-sm label-primary">Activo</span>
                                                        @else
                                                            <span class="label label-sm label-danger">Inactivo</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group pull-right">
                                                            <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="{{route('RetirarEntregableProyecto',$xGstringEntregableProyectos->ENTRPROid_entregableproyecto)}}">
                                                                        <i class="fa fa-times"></i>Retirar</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
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
