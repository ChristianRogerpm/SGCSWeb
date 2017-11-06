@extends('layouts.template')
@section('content')

    @if(isset($xstringEditEntregable))
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>Información de Entregable Modificar </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('ModificarEntregable',$xstringEditEntregable->ENTRid_entregable)}}" method="post" class="horizontal-form">
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
                                        <select id="metodologia" class="form-control select2" name="METid_metodologia">
                                            {{--<option value="0">Escoja una Metodología</option>--}}
                                            <option value="{{$xstringEditEntregable->fncRelacionMetodologia->METid_metodologia}}" selected>{{$xstringEditEntregable->fncRelacionMetodologia->METnombre_metodologia}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fase</label>
                                        <select id="fase" class="form-control select2" name="FAid_fase">
                                            <option value="{{$xstringEditEntregable->fncRelacionFase->FAid_fase}}" selected>{{$xstringEditEntregable->fncRelacionFase->FAnombre_fase}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre de Entregable</label>
                                        <input type="text" name="ENTRnombre_entregable" class="form-control" placeholder="Ingrese nombre de Metodología" value="{{$xstringEditEntregable->ENTRnombre_entregable}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select id="fase" class="form-control select2" name="ENTRestado_entregable">
                                            <option value="0">Escoja un estado</option>
                                            <option value="1" {{$xstringEditEntregable->ENTRestado_entregable == 1 ? 'selected="selected"' : ''}}>Activo</option>
                                            <option value="2" {{$xstringEditEntregable->ENTRestado_entregable == 2 ? 'selected="selected"' : ''}}>Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Descripción de Entregable</label>
                                        <textarea style="resize:none" class="form-control" name="ENTRdescripcion_entregable" rows="5" placeholder="Ingrese descripción">{{$xstringEditEntregable->ENTRdescripcion_entregable}}</textarea>
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
                    <i class="fa fa-gift"></i>Información de Entregable </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="javascript:;" class="remove"> </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{route('RegistrarEntregable')}}" method="post" class="horizontal-form">
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
                                        <select id="metodologia" class="form-control select2" name="METid_metodologia">
                                            <option value="0">Escoja una Metodología</option>
                                            @foreach($xGstringMetodologia as $xGstringMetodologias)
                                                @if($xGstringMetodologias->METestado_metodologia == 1)
                                                    <option value="{{$xGstringMetodologias->METid_metodologia}}">{{$xGstringMetodologias->METnombre_metodologia}}</option>
                                                @else
                                                    <option value="{{$xGstringMetodologias->METid_metodologia}}" disabled>{{$xGstringMetodologias->METnombre_metodologia}} (Inhabilitada)</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fase</label>
                                        <select id="fase" class="form-control select2" name="FAid_fase">
                                            <option value="0">Escoja una Fase</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nombre de Entregable</label>
                                        <input type="text" name="ENTRnombre_entregable" class="form-control" placeholder="Ingrese nombre de Metodología">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Estado</label>
                                        <select id="fase" class="form-control select2" name="ENTRestado_entregable">
                                            <option value="0">Escoja un estado</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Descripción de Entregable</label>
                                        <textarea style="resize:none" class="form-control" name="ENTRdescripcion_entregable" rows="5" placeholder="Ingrese descripción"></textarea>
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
                            <th class="min-tablet">Entregable</th>
                            <th class="min-tablet">Descripción</th>
                            <th class="min-tablet">Estado</th>
                            <th class="all">Opciones</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringEntregable as $xGstringEntregables)
                            <tr>
                                <td>{{$xGstringEntregables->fncRelacionMetodologia->METnombre_metodologia}}</td>
                                <td>{{$xGstringEntregables->fncRelacionFase->FAnombre_fase}}</td>
                                <td>{{$xGstringEntregables->ENTRnombre_entregable}}</td>
                                <td>{{$xGstringEntregables->ENTRdescripcion_entregable}}</td>
                                <td>
                                    @if($xGstringEntregables->ENTRestado_entregable == 1)
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
                                                <a href="{{route('EditarEntregable',$xGstringEntregables->ENTRid_entregable)}}">
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

@section('scripts')
    <script>
        $('#metodologia').on('change',function (e) {
            //console.log(e);
            var METid_metodologia = e.target.value;
            $.get('/CargarFasesMetodologia?METid_metodologia='+METid_metodologia,function (data){
                $('#fase').empty();
                $('#fase').append('<option value="'+'0'+'">'+'Escoja una Fase'+'</option>');
                $.each(data,function (index,subfase){
                    $('#fase').append('<option value="'+subfase.FAid_fase+'">'+subfase.FAnombre_fase+'</option>');
                });
            });
        });
    </script>
@endsection
