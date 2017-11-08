@extends('layouts.template')
@section('content')

    <div class="row">
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
                                    @else
                                        <span class="label label-sm label-danger">CANCELADO</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a data-toggle="modal" href="#large">
                                                    <i class="fa fa-info-circle"></i>Generar Revision Tarea</a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-book"></i>Version Tarea
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('Participante.Modals.FrmModalGenerarTarea')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection