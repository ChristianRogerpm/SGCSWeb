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
                            <th class="all">Nº de Versión</th>
                            <th class="min-tablet">Enlace</th>
                            <th class="min-tablet">Fecha Emitida</th>
                            <th class="min-tablet">Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringVersionesTarea as $xGstringVersionesTareas)
                            <tr>
                                <td>
                                    <span class="label label-sm label-primary">Versión {{$xGstringVersionesTareas->TAVEnumeroversion}}</span>
                                </td>
                                <td><a target="_blank" href="{{$xGstringVersionesTareas->TAVEenlace_tareaversion}}">Enlace</a></td>
                                <td>{{$xGstringVersionesTareas->TAVEfecha_emitida_tareaversion}}</td>
                                <td>
                                    @if($xGstringVersionesTareas->TAVEestado_tareaversion == 1)
                                        <span class="label label-sm label-warning">APROBADA</span>
                                    @else
                                        <span class="label label-sm label-danger">DENEGADA</span>
                                    @endif
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

@endsection