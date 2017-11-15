<div class="modal fade bs-modal-lg" id="generate{{$xGstringDocumentoRevisarr->TAREid_tarearevision}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Generar Revision de Tarea</h4>
            </div>

            <form action="{{route('GenerarVersion')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="TAREid_revision" value="{{$xGstringDocumentoRevisarr->TAREid_tarearevision}}">
                    <input type="hidden" name="TAVEnumeroversion" value="0.1">
                    <div class="portlet blue-chambray box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Duración de Proyecto </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-5 name"> Nombre de Documento: </div>
                                <div class="col-md-7 value">
                                    {{$xGstringDocumentoRevisarr->TAnombre_tarea}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Responsable : </div>
                                <div class="col-md-7 value">{{$xGstringDocumentoRevisarr->USUnombre_usuario}} {{$xGstringDocumentoRevisarr->USUapellido_usuario}}</div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Enlace de Documento: </div>
                                <div class="col-md-7 value">
                                    <a href="{{$xGstringDocumentoRevisarr->TAREurl_tarearevision}}">{{$xGstringDocumentoRevisarr->TAREurl_tarearevision}}</a>
                                    <input type="hidden" name="TAVEenlace_tareaversion" value="{{$xGstringDocumentoRevisarr->TAREurl_tarearevision}}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Fecha Emitida: </div>
                                <div class="col-md-4 value">
                                    <input type="text" class="form-control disabled text-center" value="{{$xGstringDocumentoRevisarr->TAREfecha_emitida_tarearevision}}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Fecha de Revision: </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control disabled text-center" name="TAVEfecha_emitida_tareaversion" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Aprobación: </div>
                                <div class="col-md-7 value">
                                        <label class="mt-radio">
                                            <input name="TAVEestado_tareaversion" value="1" type="radio"> Si
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input name="TAVEestado_tareaversion" value="2" type="radio"> No
                                            <span></span>
                                        </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" class="btn green">REVISAR</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>