{{--editar--}}
<div class="row">
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="{{route('ModificarTareaProyecto',$xGstringEditarTareaProyecto->TAid_tarea)}}" method="post" class="horizontal-form">
            <div class="form-body">
                <div class="row">
                    {{csrf_field()}}
                    <input type="hidden" name="TAid_tarea" value="{{$xGstringEditarTareaProyecto->TAid_tarea}}">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nombre de Tarea</label>
                                <input type="text" id="TAnombre_tarea" name="TAnombre_tarea" class="form-control" placeholder="Ingrese nombre de Tarea" value="{{$xGstringEditarTareaProyecto->TAnombre_tarea}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea style="resize:none" class="form-control" id="TAdescripcion_tarea" name="TAdescripcion_tarea" rows="5">{{$xGstringEditarTareaProyecto->TAdescripcion_tarea}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Fases</label>
                                <select id="Fase" class="form-control select2" name="FAid_fase">
                                    <option value="0">Seleccione una Fase</option>
                                    @foreach($xGstringFaseEntregableProyecto as $xGstringFaseEntregableProyectos)
                                        <option value="{{$xGstringFaseEntregableProyectos->FAid_fase}}" {{ $xGstringEditarTareaProyecto->FAid_fase == $xGstringFaseEntregableProyectos->FAid_fase ? 'selected="selected"' : 'disabled' }} >{{$xGstringFaseEntregableProyectos->FAnombre_fase}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Entregable</label>
                                <select id="Entregable" class="form-control select2" name="ENTPROid_entregableproyecto">
                                    <option value="{{$xGstringEditarEntregable->ENTRid_entregable}}">{{$xGstringEditarEntregable->ENTRnombre_entregable}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Estado de Tarea</label>
                                <select class="form-control select2" name="TAestado_tarea">
                                    <option value="0">Seleccione estado</option>
                                    <option value="1" {{ $xGstringEditarTareaProyecto->TAestado_tarea == 1 ? 'selected="selected"' : '' }}>Activo</option>
                                    <option value="2" {{ $xGstringEditarTareaProyecto->TAestado_tarea == 2 ? 'selected="selected"' : '' }}>Inactivo</option>
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
                <th class="all">Opciones</th>


            </tr>
            </thead>
            <tbody>
            @foreach($xGstringTareaProyecto as $xGstringTareaProyectos)
                <tr>
                    <td>{{$xGstringTareaProyectos->FAnombre_fase}}</td>
                    <td>{{$xGstringTareaProyectos->ENTRnombre_entregable}}</td>
                    <td>{{$xGstringTareaProyectos->TAnombre_tarea}}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="{{route('EditarTareaProyecto',$xGstringTareaProyectos->TAid_tarea)}}">
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
