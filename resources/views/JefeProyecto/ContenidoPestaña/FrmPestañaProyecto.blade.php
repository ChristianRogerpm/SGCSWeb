<form action="{{route('RegistrarMetodologiaProyecto')}}" method="post">
    <div class="row">
        <input type="hidden" name="PROid_proyecto" value="{{$xGstringProyectoSeleccionado[0]->PROid_proyecto}}">
        <input type="hidden" name="PROMETestado_proyectometodologia" value="1">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="portlet blue-chambray box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Información de Proyecto </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-5 name"> Nombre : </div>
                            <div class="col-md-7 value"> {{$xGstringProyectoSeleccionado[0]->PROnombre_proyecto}}
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Jefe de Proeyecto : </div>
                            <div class="col-md-7 value"> {{$xGstringProyectoSeleccionado[0]->fncRelacionUsuario->USUnombre_usuario}} {{$xGstringProyectoSeleccionado[0]->fncRelacionUsuario->USUapellido_usuario}} </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Metodología : </div>
                            <div class="col-md-7 value">
                                @if(count($xGstringMetodologiaProyecto) > 0)
                                    <span class="label label-sm label-success">{{$xGstringMetodologiaProyecto[0]->fncRelacionMetodologia->METnombre_metodologia}}</span>
                                @else
                                    <select id="metodologia" class="form-control select2" name="METid_metodologia">
                                        <option value="0">Escoja una Metodología</option>
                                        @foreach($xGstringMetodologia as $xGstringMetodologias)
                                            <option value="{{$xGstringMetodologias->METid_metodologia}}">{{$xGstringMetodologias->METnombre_metodologia}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Estado : </div>
                            <div class="col-md-7 value">
                                @if($xGstringProyectoSeleccionado[0]->PROestado_proyecto == 1)
                                    <span class="label label-sm label-primary"> EN CURSO </span>
                                @elseif($xGstringProyectoSeleccionado[0]->PROestado_proyecto == 2)
                                    <span class="label label-sm label-success"> FINALIZADO </span>
                                @else
                                    <span class="label label-sm label-danger"> CANCELADO </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="portlet blue-chambray box">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Duración de Proyecto </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row static-info">
                            <div class="col-md-5 name"> Fecha de Inicio : </div>
                            <div class="col-md-7 value">{{$xGstringProyectoSeleccionado[0]->PROfecha_inicio_proyecto}}</div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Fecha de Fin: </div>
                            <div class="col-md-7 value"> {{$xGstringProyectoSeleccionado[0]->PROfecha_fin_proyecto}} </div>
                        </div>
                        <div class="row static-info">
                            <div class="col-md-5 name"> Acción: </div>
                            <div class="col-md-7 value">
                                @if(count($xGstringMetodologiaProyecto) > 0)
                                    <button type="submit" class="btn btn-primary" disabled>Guardar</button>
                                @else
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
