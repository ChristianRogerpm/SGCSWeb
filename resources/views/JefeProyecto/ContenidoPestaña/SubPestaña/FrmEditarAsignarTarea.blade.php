<div class="row">
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="{{route('ModificarAsignarTarea',$xGstringEditarAsignarTareaProyecto->ATPid_asignartareaproyecto)}}" method="post" class="horizontal-form">
            <div class="form-body">
                <div class="row">
                    {{csrf_field()}}
                    @if ($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <p>Corrige los siguientes campos:</p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <input type="hidden" id="Proyecto" value="{{$xGstringProyectosAsignado}}">
                            <div class="form-group">
                                <label class="control-label">Fases</label>
                                <select id="Fase_1" class="form-control select2" name="FAid_fase">
                                    @foreach($xGstringFaseEntregableProyecto as $xGstringFaseEntregableProyectos)
                                        <option value="{{$xGstringFaseEntregableProyectos->FAid_fase}}" {{ $xGstringEditarAsignarTareaProyecto->FAid_fase == $xGstringFaseEntregableProyectos->FAid_fase ? 'selected="selected"' : 'disabled' }}>{{$xGstringFaseEntregableProyectos->FAnombre_fase}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Entregable</label>
                                <select id="Entregable_1" class="form-control select2" name="ENTRPROid_entregableproyecto">
                                    @foreach($xGstringEntregableTareaProyecto as $xGstringEntregableTareaProyectos)
                                        <option value="{{$xGstringEntregableTareaProyectos->ENTRid_entregable}}" selected>{{$xGstringEntregableTareaProyectos->ENTRnombre_entregable}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tarea</label>
                                <select id="Tarea_1" class="form-control select2" name="TAid_tarea">
                                    @foreach($xGstringTareaProyecto as $xGstringTareaProyectos)
                                        <option value="{{$xGstringTareaProyectos->TAid_tarea}}" selected>{{$xGstringTareaProyectos->TAnombre_tarea}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Responsable</label>
                                <select class="form-control select2" name="USUPROid_usuarioproyecto">
                                    @foreach($xGstringUsuarioProyecto as $xGstringUsuarioProyectos)
                                        <option value="{{$xGstringUsuarioProyectos->USUPROid_usuarioproyecto}}" {{ $xGstringEditarAsignarTareaProyecto->USUPROid_usuarioproyecto == $xGstringUsuarioProyectos->USUPROid_usuarioproyecto ? 'selected="selected"' : 'disabled' }}>{{$xGstringUsuarioProyectos->USUnombre_usuario}} {{$xGstringUsuarioProyectos->USUapellido_usuario}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Fechas</label>
                                <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy/mm/dd">
                                    <input type="text" class="form-control" name="ATPfecha_inicio_tareaproyecto" placeholder="F. Inicio" value="{{$xGstringEditarAsignarTareaProyecto->ATPfecha_inicio_tareaproyecto}}">
                                    <span class="input-group-addon"> a </span>
                                    <input type="text" class="form-control" name="ATPfecha_fin_tareaproyecto" placeholder="F. Fin" value="{{$xGstringEditarAsignarTareaProyecto->ATPfecha_fin_tareaproyecto}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Estado</label>
                                <select class="form-control select2" name="ATPestado_tareaproyecto">
                                    <option value="0">Seleccione estado</option>
                                    <option value="1" {{ $xGstringEditarAsignarTareaProyecto->ATPestado_tareaproyecto == 1 ? 'selected="selected"' : '' }}>EN CURSO</option>
                                    <option value="2" {{ $xGstringEditarAsignarTareaProyecto->ATPestado_tareaproyecto == 2 ? 'selected="selected"' : '' }}>FINALIZADO</option>
                                    <option value="3" {{ $xGstringEditarAsignarTareaProyecto->ATPestado_tareaproyecto == 3 ? 'selected="selected"' : '' }}>CANCELADO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions right">
                <button type="button" class="btn default">Cancelar</button>
                <button type="submit" class="btn blue">
                    <i class="fa fa-check"></i> Guardar</button>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
            <thead>
            <tr>
                <th class="all">Fase</th>
                <th class="min-tablet">Entregable</th>
                <th class="min-tablet">Tarea</th>
                <th class="min-tablet">Responsable</th>
                <th class="min-tablet">Fechas</th>
                <th class="min-tablet">Estado</th>
                <th class="all">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($xGstringAsignarTareaProyecto as $xGstringAsignarTareaProyectos)
                <tr>
                    <td>{{$xGstringAsignarTareaProyectos->FAnombre_fase}}</td>
                    <td>{{$xGstringAsignarTareaProyectos->ENTRnombre_entregable}}</td>
                    <td>{{$xGstringAsignarTareaProyectos->TAnombre_tarea}}</td>
                    <td>{{$xGstringAsignarTareaProyectos->USUnombre_usuario}}</td>
                    <td>
                        {{$xGstringAsignarTareaProyectos->ATPfecha_inicio_tareaproyecto}}
                        {{$xGstringAsignarTareaProyectos->ATPfecha_fin_tareaproyecto}}
                    </td>
                    <td>
                        @if($xGstringAsignarTareaProyectos->ATPestado_tareaproyecto == 1)
                            <span class="label label-sm label-primary">EN CURSO</span>
                        @elseif($xGstringAsignarTareaProyectos->ATPestado_tareaproyecto == 2)
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
                                    <a href="{{route('EditarAsignarTarea',$xGstringAsignarTareaProyectos->ATPid_asignartareaproyecto)}}">
                                        <i class="fa fa-info-circle"></i>Editar</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


