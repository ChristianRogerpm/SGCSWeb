@extends('layouts.template')
@section('content')

    @if(isset($xGstringEditFase))
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Información de Fase Modificada </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('ModificarFase',$xGstringEditFase->FAid_fase)}}" method="post" class="horizontal-form">
                    <div class="form-body">
                        <div class="row">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$xGstringEditFase->FAid_fase}}" name="FAid_fase">
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
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Metodología</label>
                                        <select class="form-control select2" name="METid_metodologia">
                                            <option value="0">Escoja una Metodología</option>
                                            @foreach($xGstringMetodologia as $xGstringMetodologias)
                                                @if($xGstringMetodologias->METestado_metodologia == 1)
                                                    <option value="{{$xGstringMetodologias->METid_metodologia}}" {{ $xGstringEditFase->METid_metodologia == $xGstringMetodologias->METid_metodologia ? 'selected="selected"' : '' }}>{{$xGstringMetodologias->METnombre_metodologia}}</option>
                                                @else
                                                    <option value="{{$xGstringMetodologias->METid_metodologia}}" disabled {{ $xGstringEditFase->METid_metodologia == $xGstringMetodologias->METid_metodologia ? 'selected="selected"' : '' }}>{{$xGstringMetodologias->METnombre_metodologia}} (Inhabilitada)</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nombre de Fase</label>
                                        <input type="text" name="FAnombre_fase" class="form-control" value="{{$xGstringEditFase->FAnombre_fase}}" placeholder="Ingrese nombre de Fase">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control select2" name="FAestado_fase">
                                            <option value="0">Escoja un estado</option>
                                            <option value="1" {{ $xGstringEditFase->FAestado_fase == 1 ? 'selected="selected"' : '' }}>Activo</option>
                                            <option value="2" {{ $xGstringEditFase->FAestado_fase == 2 ? 'selected="selected"' : '' }}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Descripción de Fase</label>
                                        <textarea style="resize:none" class="form-control" name="FAdescripcion_fase" rows="8" placeholder="Ingrese descripción">
                                            {{$xGstringEditFase->FAdescripcion_fase}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
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
                    <i class="fa fa-gift"></i>Información de Fase </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('RegistrarFase')}}" method="post" class="horizontal-form">
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
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Metodología</label>
                                        <select class="form-control select2" name="METid_metodologia">
                                            <option value="0">Escoja una Metodología</option>
                                            @foreach($xGstringMetodologia as $xGstringMetodologias)
                                                @if($xGstringMetodologias->METestado_metodologia == 1)
                                                    <option value="{{$xGstringMetodologias->METid_metodologia}}">{{$xGstringMetodologias->METnombre_metodologia}}</option>
                                                @else
                                                    <option value="{{$xGstringMetodologias->METid_metodologia}}"disabled>{{$xGstringMetodologias->METnombre_metodologia}} (Inhabilitada)</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nombre de Fase</label>
                                        <input type="text" name="FAnombre_fase" class="form-control" placeholder="Ingrese nombre de Fase">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select class="form-control select2" name="FAestado_fase">
                                            <option value="0">Escoja un estado</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Descripción de Fase</label>
                                        <textarea style="resize:none" class="form-control" name="FAdescripcion_fase" rows="9" placeholder="Ingrese descripción"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
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
                            <th class="min-tablet">Fase</th>
                            <th class="min-tablet">Descripción</th>
                            <th class="min-tablet">Estado</th>
                            <th class="all">Opciones</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringFase as $xGstringFases)
                            <tr>
                                <td>{{$xGstringFases->fncRelacionMetodologia->METnombre_metodologia}}</td>
                                <td>{{$xGstringFases->FAnombre_fase}}</td>
                                <td>{{str_limit($xGstringFases->FAdescripcion_fase,$limit=100,$end = '...')}}</td>
                                <td>
                                    @if($xGstringFases->FAestado_fase == 1)
                                        <span class="label label-sm label-success"> Activo </span>
                                    @else
                                        <span class="label label-sm label-danger"> Inactivo </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opción
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="{{route('EditarFase',$xGstringFases->FAid_fase)}}">
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
