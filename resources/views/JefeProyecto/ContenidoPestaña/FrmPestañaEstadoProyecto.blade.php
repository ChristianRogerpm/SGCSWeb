<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i>Estado de Proyecto </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <ul class="nav nav-tabs tabs-left">
                    {{--<li class="active">--}}
                        {{--<a href="#tab_6_9999" data-toggle="tab">Fases</a>--}}
                    {{--</li>--}}
                    @foreach($xGstringProyectoMetodologia as $xGstringProyectoMetodologias)
                        <li>
                            <a href="#tab_6_{{$xGstringProyectoMetodologias->FAid_fase}}" data-toggle="tab">{{$xGstringProyectoMetodologias->FAnombre_fase}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="tab-content">
                    {{--<div class="tab-pane active" id="tab_6_9999">--}}
                        {{--<p> Revisar </p>--}}
                    {{--</div>--}}
                    @foreach($xGstringProyectoMetodologia as $xGstringProyectoMetodologias)
                        <div class="tab-pane fade" id="tab_6_{{$xGstringProyectoMetodologias->FAid_fase}}">
                            <div class="portlet-body">
                                <div class="panel-group accordion" id="accordion3">
                                    @foreach($xGstringEntregableProyecto as $xGstringEntregableProyectos)
                                        @if($xGstringProyectoMetodologias->FAid_fase == $xGstringEntregableProyectos->FAid_fase)
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_{{$xGstringEntregableProyectos->ENTRPROid_entregableproyecto}}"> {{$xGstringEntregableProyectos->ENTRnombre_entregable}} </a>
                                                    </h4>
                                                </div>
                                                <div id="collapse_3_{{$xGstringEntregableProyectos->ENTRPROid_entregableproyecto}}" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <h3>Tareas Registradas</h3>
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th> Nombre de Tarea </th>
                                                                <th> Descripción de Tarea </th>
                                                                <th> Estado </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($xGstringTareaFase as $xGstringTareaFases)
                                                                @if($xGstringTareaFases->ENTPROid_entregableproyecto == $xGstringEntregableProyectos->ENTRPROid_entregableproyecto)
                                                                    <tr>
                                                                        <td> {{$xGstringTareaFases->TAnombre_tarea}} </td>
                                                                        <td> {{$xGstringTareaFases->TAdescripcion_tarea}} </td>
                                                                        <td> @if($xGstringTareaFases->TAestado_tarea == 1)
                                                                                <span class="label label-sm label-primary">Activo</span>
                                                                            @else
                                                                                <span class="label label-sm label-danger">Inactivo</span>
                                                                            @endif </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        <br>
                                                        <h3>Tareas Asignadas</h3>
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th> Nombre de Tarea </th>
                                                                <th> Responsable </th>
                                                                <th> Fecha Inicio - Fin </th>
                                                                <th> Estado</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($xGstringTareaAsignadaFase as $xGstringTareaAsignadaFases)
                                                                @if($xGstringTareaAsignadaFases->ENTRPROid_entregableproyecto == $xGstringEntregableProyectos->ENTRPROid_entregableproyecto)
                                                                    <tr>
                                                                        <td> {{$xGstringTareaAsignadaFases->TAnombre_tarea}} </td>
                                                                        <td> {{$xGstringTareaAsignadaFases->USUnombre_usuario}} {{$xGstringTareaAsignadaFases->USUapellido_usuario}} </td>
                                                                        <td> {{$xGstringTareaAsignadaFases->ATPfecha_inicio_tareaproyecto}} {{$xGstringTareaAsignadaFases->ATPfecha_fin_tareaproyecto}}</td>
                                                                        <td> @if($xGstringTareaAsignadaFases->ATPestado_tareaproyecto == 1)
                                                                                <span class="label label-sm label-primary">EN CURSO</span>
                                                                            @elseif($xGstringTareaAsignadaFases->ATPestado_tareaproyecto == 2)
                                                                                <span class="label label-sm label-success">FINALIZADO</span>
                                                                            @elseif($xGstringTareaAsignadaFases->ATPestado_tareaproyecto == 3)
                                                                                <span class="label label-sm label-danger">CANCELADO</span>
                                                                            @elseif($xGstringTareaAsignadaFases->ATPestado_tareaproyecto == 4)
                                                                                <span class="label label-sm label-default">EN REVISION</span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

