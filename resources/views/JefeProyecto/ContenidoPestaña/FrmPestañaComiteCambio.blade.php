<div class="row">
    <div class="col-md-12">
        @if(session()->has('flash'))
            {{--<div class="alert alert-success">{{session('flash')}}</div>--}}
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{session('flash')}}
            </div>
        @endif
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{route('RegistrarComiteCambio')}}" method="post" class="form-horizontal form-row-seperated">
                <div class="form-body">
                    {{csrf_field()}}
                    <input type="hidden" name="COMCAestado_comitecambio" value="1">
                    <div class="form-group">
                        <label class="control-label col-md-3">Participantes de Proyecto</label>
                        <div class="col-md-9">
                            <select multiple class="multi-select" id="my_multi_select1" name="USUPROid_usuarioproyecto[]">
                                @foreach($xGstringUsuarioProyecto as $xGstringUsuarioProyectos)
                                    <option value="{{$xGstringUsuarioProyectos->USUPROid_usuarioproyecto}}">{{$xGstringUsuarioProyectos->USUnombre_usuario}} {{$xGstringUsuarioProyectos->USUapellido_usuario}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                {{--<input type="hidden" name="PROid_proyecto" value="{{$xGstringProyectosAsignado}}">--}}
                {{--<input type="hidden" name="USUPROestado_usuarioproyecto" value="1">--}}
                <div class="form-actions right">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green">
                                <i class="fa fa-check"></i> GUARDAR</button>
                            <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END FORM-->
        </div>
    </div>
</div>
