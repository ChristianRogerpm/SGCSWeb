<div class="modal fade bs-modal-lg" id="generate{{$xGstringEntregablesAsignados->ENTRid_entregable}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Generar Revision Entregable</h4>
            </div>


            <form action="{{route('RevisionEntregable')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="ENTRPROid_entregableproyecto" value="{{$xGstringEntregablesAsignados->ENTRPROid_entregableproyecto}}">
                <input type="hidden" name="ENTRREVestado_entregablerevision" value="1">
                <div class="modal-body">
                    <div class="portlet blue-chambray box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Duración de Proyecto </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-5 name"> Nombre de Documento: </div>
                                <div class="col-md-7 value">
                                    {{$xGstringEntregablesAsignados->ENTRnombre_entregable}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Responsable(s) : </div>
                                @foreach($UsuariosResponsables as $Usurespon)
                                    @if($Usurespon->ENTRid_entregable == $xGstringEntregablesAsignados->ENTRid_entregable)
                                        <div class="col-md-5 name"></div>
                                        <div class="col-md-7 value">{{$Usurespon->USUnombre_usuario}} {{$Usurespon->USUapellido_usuario}}</div>
                                    @else
                                    @endif
                                @endforeach
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Fecha de Emitida: </div>
                                <div class="col-md-4 value">
                                    <input type="text" class="form-control disabled text-center" name="ENTRREVfecha_emitida_entregablerevision" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Tarea(s): </div>
                                @foreach($TareasEntregable as $TareasEntregables)
                                    @if($TareasEntregables->ENTRid_entregable == $xGstringEntregablesAsignados->ENTRid_entregable)
                                        <div class="col-md-5 name"></div>
                                        <div class="col-md-7 value">{{$TareasEntregables->TAnombre_tarea}}</div>
                                    @else
                                    @endif
                                @endforeach
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Enlace Final: </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="ENTRREVurl_entregablerevision" value="">
                                </div>
                            </div>

                            <div class="row static-info">
                                <div class="col-md-5 name"> Observacion(es): </div>
                                <div class="col-md-5">
                                    <textarea style="resize:none" class="form-control" name="ENTRREVobservacion_entregablerevision" rows="5"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" class="btn green">GENERAR REVISION</button>
                </div>
            </form>
        <!-- /.modal-content -->
        </div>
    </div>
    <!-- /.modal-dialog -->
</div>