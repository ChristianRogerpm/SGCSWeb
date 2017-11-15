@extends('layouts.template')
@section('content')

    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Información de Entregable
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{route('GenerarSolicitudCambio')}}" method="post" class="horizontal-form">
                <div class="form-body">
                    <div class="row">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Codigo</label>
                                    <input type="text" name="SOLICAMcodigo_solicitudcambio" class="form-control" placeholder="Ingrese nombre de Metodología">
                                    <input type="hidden" name="SOLICAMestado_solicitudcambio" value="1">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Solicitante</label>
                                    <input type="text" class="form-control disabled" value="{{Auth::user()->USUnombre_usuario}} {{Auth::user()->USUapellido_usuario}}">
                                    <input type="hidden" name="USUid_usuario" value="{{Auth::user()->USUid_usuario}}">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Proyecto</label>
                                    <select id="Proyecto" class="form-control select2" name="PROid_proyecto">
                                        <option value="0">Seleccione su Proyecto</option>
                                        @foreach($xGstringProyectosAsignados as $xGstringProyectosAsignadoss)
                                            <option value="{{$xGstringProyectosAsignadoss->PROid_proyecto}}">{{$xGstringProyectosAsignadoss->PROnombre_proyecto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Fase</label>
                                    <select id="Fase" class="form-control select2" name="FAid_fase">
                                        <option value="0">Seleccione un Proyecto antes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Entregable</label>
                                    <select id="Entregable" class="form-control select2" name="ENTPROid_entregableproyecto">
                                        <option value="0">Seleccione una Fase antes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tarea</label>
                                    <select id="Tarea" class="form-control select2" name="TAid_tarea">
                                        <option value="0">Seleccione un Entregable antes</option>
                                    </select>
                                </div>
                                <input type="hidden" name="SOLICAMfecha_solicitud_solicitudcambio" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Descripción del cambio Solicitado</label>
                                    <textarea style="resize:none" class="form-control" name="SOLICAMdescripcion_solicitudcambio" rows="7" placeholder="Ingrese descripción"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Objetivo de la Solicitud</label>
                                    <textarea style="resize:none" class="form-control" name="SOLICAMobjetivo_solicitudcambio" rows="8" placeholder="Ingrese descripción"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="button" class="btn default">Cancelar</button>
                        <button type="submit" class="btn blue">
                        <i class="fa fa-check"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption font-light">
                        <i class="icon-settings font-light"></i>
                        <span class="caption-subject bold uppercase">Lista de Solicitudes de Cambio Realizadas</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                        <thead>
                        <tr>
                            <th class="all">Codigo</th>
                            <th class="min-tablet">Proyecto</th>
                            <th class="min-tablet">Fase</th>
                            <th class="min-tablet">Entregable</th>
                            <th class="desktop">Tarea</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($xGstringSolicitudCambio as $Solicitud)
                                <tr>
                                    <td>{{$Solicitud->SOLICAMcodigo_solicitudcambio}}</td>
                                    <td>{{$Solicitud->PROnombre_proyecto}}</td>
                                    <td>{{$Solicitud->FAnombre_fase}}</td>
                                    <td>{{$Solicitud->ENTRnombre_entregable}}</td>
                                    <td>{{$Solicitud->TAnombre_tarea}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $('#Proyecto').on('change',function (e) {
            var PROid_proyecto = e.target.value;
            var USUid_usuario = {{Auth::user()->USUid_usuario}}

            $.get('/CargarFasesProyecto?PROid_proyecto='+PROid_proyecto+'&USUid_usuario='+USUid_usuario,function (data){
                $('#Fase').empty();
                $('#Fase').append('<option value="'+'0'+'">'+'Seleccione una Fase'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Fase').append('<option value="'+subfase.FAid_fase+'">'+subfase.FAnombre_fase+'</option>');
                });
            });
        });

        $('#Fase').on('change',function (e) {

            var x = document.getElementById("Proyecto");


            var FAid_fase = e.target.value;
            var PROid_proyecto = x.options[x.selectedIndex].value;
            var USUid_usuario = {{Auth::user()->USUid_usuario}}

            $.get('/CargarEntregableProyecto?FAid_fase='+FAid_fase+'&USUid_usuario='+USUid_usuario+'&PROid_proyecto='+PROid_proyecto,function (data){
                $('#Entregable').empty();
                $('#Entregable').append('<option value="'+'0'+'">'+'Seleccione un Entregable'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Entregable').append('<option value="'+subfase.ENTRPROid_entregableproyecto+'">'+subfase.ENTRnombre_entregable+'</option>');
                });
            });

        });

        $('#Entregable').on('change',function (e) {

            var w = document.getElementById("Proyecto");

            var ENTRPROid_entregableproyecto = e.target.value;
            var PROid_proyecto = w.options[w.selectedIndex].value;
            var USUid_usuario = {{Auth::user()->USUid_usuario}}

            $.get('/CargarTareaProyectoCambio?ENTRPROid_entregableproyecto='+ENTRPROid_entregableproyecto+'&PROid_proyecto='+PROid_proyecto+'&USUid_usuario='+USUid_usuario,function (data){
                $('#Tarea').empty();
                $('#Tarea').append('<option value="'+'0'+'">'+'Seleccione una Tarea'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Tarea').append('<option value="'+subfase.TAid_tarea+'">'+subfase.TAnombre_tarea+'</option>');
                });
            });

        });

    </script>
@endsection