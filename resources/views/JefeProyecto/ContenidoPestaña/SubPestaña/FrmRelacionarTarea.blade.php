<div class="row">
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="{{route('RegistrarRelacionTareaProyecto')}}" method="post" class="horizontal-form">
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
                    @if(session()->has('flash'))
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                {{session('flash')}}
                            </div>
                        </div>
                    @endif
                        <div class="col-md-6">
                            <input type="hidden" id="Proyecto" value="{{$xGstringProyectosAsignado}}">
                            <div class="form-group">
                                <label class="control-label">Fases</label>
                                <select id="Fase_1" class="form-control select2">
                                    <option value="0">Seleccione una Fase</option>
                                    @foreach($xGstringFaseEntregableProyecto as $xGstringFaseEntregableProyectos)
                                        <option value="{{$xGstringFaseEntregableProyectos->FAid_fase}}">{{$xGstringFaseEntregableProyectos->FAnombre_fase}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Entregable</label>
                                <select id="Entregable_1" class="form-control select2">
                                    <option value="0">Seleccione una Fase primero</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tarea</label>
                                <select id="Tarea_1" class="form-control select2" name="TAid_tarea1">
                                    <option value="0">Seleccione una Tarea</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Fases</label>
                                <select id="Fase_2" class="form-control select2">
                                    <option value="0">Seleccione una Fase</option>
                                    @foreach($xGstringFaseEntregableProyecto as $xGstringFaseEntregableProyectos)
                                        <option value="{{$xGstringFaseEntregableProyectos->FAid_fase}}">{{$xGstringFaseEntregableProyectos->FAnombre_fase}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Entregable</label>
                                <select id="Entregable_2" class="form-control select2">
                                    <option value="0">Seleccione una Fase primero</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tarea</label>
                                <select id="Tarea_2" class="form-control select2" name="TAid_tarea2">
                                    <option value="0">Seleccione una Tarea</option>
                                </select>
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
            @foreach($xGstringRelacionTareaProyecto as $xGstringRelacionTareaProyectos)

                <tr>
                    <td>{{$xGstringRelacionTareaProyectos->FAnombre_fase}}</td>
                    <td>{{$xGstringRelacionTareaProyectos->ENTRnombre_entregable}}</td>
                    <td>{{$xGstringRelacionTareaProyectos->TAnombre_tarea}}</td>
                    <td>
                        <div class="btn-group pull-right">
                            <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="{{route('RetirarRelacion',$xGstringRelacionTareaProyectos->RETAid_relaciontarea)}}">
                                        <i class="fa fa-pencil-square-o"></i>Retirar</a>
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
