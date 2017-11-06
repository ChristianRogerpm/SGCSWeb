@extends('layouts.template')
@section('content')

    @if(isset($xGstringEditMetodologia))
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Información de Metodología Modificar </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('ModificarMetodologia',$xGstringEditMetodologia)}}" method="post" class="horizontal-form">
                    <div class="form-body">
                        <div class="row">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$xGstringEditMetodologia->METid_metodologia}}">
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
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre de Metodologia</label>
                                        <input type="text" name="METnombre_metodologia" class="form-control" value="{{$xGstringEditMetodologia->METnombre_metodologia}}" placeholder="Ingrese nombre de Metodología">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control select2" name="METestado_metodologia">
                                            <option value="0">Escoja un estado</option>
                                            <option value="1" {{ $xGstringEditMetodologia->METestado_metodologia == 1 ? 'selected="selected"' : '' }}>Activo</option>
                                            <option value="2" {{ $xGstringEditMetodologia->METestado_metodologia == 2 ? 'selected="selected"' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Descripción de Metodología</label>
                                        <textarea style="resize:none" class="form-control" name="METdescripcion_metodologia" rows="5" placeholder="Ingrese descripción">
                                            {{$xGstringEditMetodologia->METdescripcion_metodologia}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
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
                    <i class="fa fa-gift"></i>Información de Metodología </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('RegistrarMetodologia')}}" method="post" class="horizontal-form">
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
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre de Metodologia</label>
                                        <input type="text" name="METnombre_metodologia" class="form-control" placeholder="Ingrese nombre de Metodología">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control select2" name="METestado_metodologia">
                                            <option value="0">Escoja un estado</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Descripción de Metodología</label>
                                        <textarea style="resize:none" class="form-control" name="METdescripcion_metodologia" rows="5" placeholder="Ingrese descripción"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
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
                            <th class="all">Metodologia</th>
                            <th class="min-tablet">Descripción</th>
                            <th class="min-tablet">Estado</th>
                            <th class="all">Opciones</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringMetodologia as $xGstringMetodologias)
                            <tr>
                                <td>{{$xGstringMetodologias->METnombre_metodologia}}</td>
                                <td>{{$xGstringMetodologias->METdescripcion_metodologia}}</td>
                                <td>
                                    @if($xGstringMetodologias->METestado_metodologia == 1)
                                        <span class="label label-sm label-success"> Activo </span>
                                    @else
                                        <span class="label label-sm label-danger"> Inactivo </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="{{route('EditarMetodologia',$xGstringMetodologias->METid_metodologia)}}">
                                                    <i class="fa fa-pencil-square-o"></i> Editar </a>
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