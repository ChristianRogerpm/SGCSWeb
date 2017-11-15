<div class="row">
    <div class="col-md-12">
        @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
        @endif
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form action="{{route('RegistrarEntregableProyecto')}}" method="post" class="form-horizontal form-row-seperated">
                <div class="form-body">
                    {{csrf_field()}}
                    <div class="row">
                        <input type="hidden" name="PROid_proyecto" value="{{$xGstringProyectosAsignado}}">
                        <input type="hidden" name="METid_metodologia" value="{{$xGstringMetodologiaProyecto->METid_metodologia}}">
                        <input type="hidden" name="ENTRPROestado_entregable_proyecto" value="1">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Metodologia Seleccionada:</label>
                                <input type="text" name="FAnombre_fase" class="form-control" value="{{$xGstringMetodologiaProyecto->METnombre_metodologia}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Lista de Fases:</label>
                                <select id="ENTRPROid_fase" class="form-control select2" name="FAid_fase">
                                    <option value="0">Escoja una Fase</option>
                                    @foreach($xGstringFaseProyecto as $xGstringFaseProyectos)
                                        <option value="{{$xGstringFaseProyectos->FAid_fase}}">{{$xGstringFaseProyectos->FAnombre_fase}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Entregables:</label>
                                {{--<input type="text" name="FAnombre_fase" class="form-control" value="{{$xGstringMetodologiaProyecto->METnombre_metodologia}}" disabled>--}}
                            </div>
                            <div class="input_fields_wrap">
                            </div>
                        </div>
                    </div>
                </div>
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
@section('scripts')
    <script>
        $('#ENTRPROid_fase').on('change',function (e) {
            var FAid_fase = e.target.value;
            var wrapper = $(".input_fields_wrap");
            $.get('/CargarEntregableFase?FAid_fase='+FAid_fase,function (data){
                $(wrapper).empty();
                $.each(data,function (index,subfase){
                    $(wrapper).append('<div class="form-check">\n' +
                        '  <label class="form-check-label">\n' +
                        '    <input class="form-check-input" type="checkbox" name="ENTRid_entregable[]" value="'+subfase.ENTRid_entregable+'">\n' +
                        '    '+subfase.ENTRnombre_entregable+' ' +
                        '  </label>\n' +
                        '</div>');
                });
            });
        });
    </script>
@endsection