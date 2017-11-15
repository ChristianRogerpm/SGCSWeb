@extends('layouts.template')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('flash'))
                {{--<div class="alert alert-success">{{session('flash')}}</div>--}}
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{session('flash')}}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption font-light">
                        <i class="icon-settings font-light"></i>
                        <span class="caption-subject bold uppercase">Lista de Tareas Asignados</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                        <thead>
                        <tr>
                            <th class="all">Nombre de Tarea</th>
                            <th class="min-tablet">Fecha de Inicio</th>
                            <th class="min-tablet">Fecha de Fin</th>
                            <th class="min-tablet">Estado</th>
                            <th class="all">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringTareasAsignadas as $xGstringTareasAsignadass)
                            <tr>
                                <td>{{$xGstringTareasAsignadass->TAnombre_tarea}}</td>
                                <td class="text-center">{{$xGstringTareasAsignadass->ATPfecha_inicio_tareaproyecto}}</td>
                                <td class="text-center">{{$xGstringTareasAsignadass->ATPfecha_fin_tareaproyecto}}</td>
                                <td>
                                    @if($xGstringTareasAsignadass->ATPestado_tareaproyecto == 1)
                                        <span class="label label-sm label-primary">EN CURSO</span>
                                    @elseif($xGstringTareasAsignadass->ATPestado_tareaproyecto == 2)
                                        <span class="label label-sm label-success">FINALIZADO</span>
                                    @elseif($xGstringTareasAsignadass->ATPestado_tareaproyecto == 3)
                                        <span class="label label-sm label-danger">CANCELADO</span>
                                    @else
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
                                                <a data-toggle="modal" href="#detail{{$xGstringTareasAsignadass->ATPid_asignartareaproyecto}}">
                                                    <i class="fa fa-address-book"></i> Detalle de Tarea
                                                </a>
                                            </li>
                                            @if($xGstringTareasAsignadass->ATPestado_tareaproyecto == 4)
                                                <li class="disabled">
                                                    <a data-toggle="modal" href="#generate{{$xGstringTareasAsignadass->ATPid_asignartareaproyecto}}">
                                                        <i class="fa fa-info-circle"></i>Generar Revision Tarea</a>
                                                </li>
                                            @elseif($xGstringTareasAsignadass->ATPestado_tareaproyecto == 2)
                                                <li class="disabled">
                                                    <a data-toggle="modal" href="#generate{{$xGstringTareasAsignadass->ATPid_asignartareaproyecto}}">
                                                        <i class="fa fa-info-circle"></i>Generar Revision Tarea</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a data-toggle="modal" href="#generate{{$xGstringTareasAsignadass->ATPid_asignartareaproyecto}}">
                                                        <i class="fa fa-info-circle"></i>Generar Revision Tarea</a>
                                                </li>
                                            @endif

                                            <li>
                                                <a href="{{route('MostrarTareaVersion',$xGstringTareasAsignadass->ATPid_asignartareaproyecto)}}">
                                                    <i class="fa fa-book"></i>Version Tarea
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('Participante.Modals.FrmModalGenerarTarea')
                            @include('Participante.Modals.FrmModalDetalleTarea')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection