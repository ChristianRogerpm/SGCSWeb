@extends('layouts.template')
@section('content')

    @if(isset($xGstringEditarProyecto))
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Información de Proyecto Modificada </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('ModificarProyecto',$xGstringEditarProyecto->PROid_proyecto)}}" method="post" class="horizontal-form">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nombre de Proyecto</label>
                                    <input type="text" name="PROnombre_proyecto" class="form-control" placeholder="Ingrese el nombre de Proyecto" value="{{$xGstringEditarProyecto->PROnombre_proyecto}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Jefe de Proyecto</label>
                                    <select class="form-control select2" name="USUid_usuario">
                                        <option value="0">Seleccione un Jefe</option>
                                        @foreach($xGstringUsuario as $xGstringUsuarios)
                                            <option value="{{$xGstringUsuarios->USUid_usuario}}" {{ $xGstringEditarProyecto->USUid_usuario == $xGstringUsuarios->USUid_usuario ? 'selected="selected"' : '' }}>{{$xGstringUsuarios->USUnombre_usuario}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Fechas</label>

                                    <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy/mm/dd">
                                        <input type="text" class="form-control" name="PROfecha_inicio_proyecto" placeholder="F. Inicio" value="{{$xGstringEditarProyecto->PROfecha_inicio_proyecto}}">
                                        <span class="input-group-addon"> a </span>
                                        <input type="text" class="form-control" name="PROfecha_fin_proyecto" placeholder="F. Fin" value="{{$xGstringEditarProyecto->PROfecha_fin_proyecto}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Descripción</label>
                                    <textarea style="resize:none" class="form-control" name="PROdescripcion_proyecto" rows="5" placeholder="Ingrese alguna descripción">{{$xGstringEditarProyecto->PROdescripcion_proyecto}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Estado</label>
                                    <select class="form-control select2" name="PROestado_proyecto">
                                        <option value="0">Seleccione estado</option>
                                        <option value="1" {{ $xGstringEditarProyecto->PROestado_proyecto == 1 ? 'selected="selected"' : '' }}>EN CURSO</option>
                                        <option value="2" {{ $xGstringEditarProyecto->PROestado_proyecto == 2 ? 'selected="selected"' : '' }}>FINALIZADO</option>
                                        <option value="3" {{ $xGstringEditarProyecto->PROestado_proyecto == 3 ? 'selected="selected"' : '' }}>CANCELADO</option>
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
    @else
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Información de Proyecto </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('RegistrarProyecto')}}" method="post" class="horizontal-form">
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Nombre de Proyecto</label>
                                    <input type="text" name="PROnombre_proyecto" class="form-control" placeholder="Ingrese el nombre de Proyecto">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Jefe de Proyecto</label>
                                    <select class="form-control select2" name="USUid_usuario">
                                        <option value="0">Seleccione un Jefe</option>
                                        @foreach($xGstringUsuario as $xGstringUsuarios)
                                            <option value="{{$xGstringUsuarios->USUid_usuario}}">{{$xGstringUsuarios->USUnombre_usuario}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Fechas</label>

                                    <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy/mm/dd">
                                        <input type="text" class="form-control" name="PROfecha_inicio_proyecto" placeholder="F. Inicio">
                                        <span class="input-group-addon"> a </span>
                                        <input type="text" class="form-control" name="PROfecha_fin_proyecto" placeholder="F. Fin">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="control-label">Descripción</label>
                                    <textarea style="resize:none" class="form-control" name="PROdescripcion_proyecto" rows="5" placeholder="Ingrese alguna descripción"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Estado</label>
                                    <select class="form-control select2" name="PROestado_proyecto">
                                        <option value="0">Seleccione estado</option>
                                        <option value="1">EN CURSO</option>
                                        <option value="2">FINALIZADO</option>
                                        <option value="3">CANCELADO</option>
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
    @endif
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
                            <th class="all">Nombre de Proyecto</th>
                            <th class="min-tablet">Jefe de Proyecto</th>
                            <th class="min-tablet">Fecha de Inicio</th>
                            <th class="min-tablet">Fecha de Fin</th>
                            <th class="desktop">Estado</th>
                            <th class="all">Opciones</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringProyecto as $xGstringProyectos)
                            <tr>
                                <td>{{$xGstringProyectos->PROnombre_proyecto}}</td>
                                <td>{{$xGstringProyectos->fncRelacionUsuario->USUnombre_usuario}}</td>
                                <td>{{$xGstringProyectos->PROfecha_inicio_proyecto}}</td>
                                <td>{{$xGstringProyectos->PROfecha_fin_proyecto}}</td>
                                <td>
                                    @if($xGstringProyectos->PROestado_proyecto == 1)
                                        <span class="label label-sm label-primary">EN CURSO</span>
                                    @elseif($xGstringProyectos->PROestado_proyecto == 2)
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
                                                <a href="{{route('EditarProyecto',$xGstringProyectos->PROid_proyecto)}}">
                                                    <i class="fa fa-pencil-square-o"></i>Editar</a>
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

@endsection