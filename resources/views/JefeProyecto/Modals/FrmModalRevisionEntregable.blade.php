<div class="modal fade bs-modal-lg" id="generate2{{$EntregableRevisar->ENTRREVid_entregablerevision}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Generar Revision de Tarea</h4>
            </div>

            <form action="{{route('GenerarVersionEntregable')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="ENTRREVid_entregablerevision" value="{{$EntregableRevisar->ENTRREVid_entregablerevision}}">
                    <input type="hidden" name="ENTRVERnumero_entregableversion" value="0.1">
                    <input type="hidden" name="ENTRVERemitidopor_entregableversion" value="{{Auth::user()->USUnombre_usuario}} {{Auth::user()->USUapellido_usuario}}">
                    <input type="hidden" name="ENTRPROid_entregableproyecto" value="{{$EntregableRevisar->ENTRPROid_entregableproyecto}}">
                    <div class="portlet blue-chambray box">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cogs"></i>Duración de Proyecto </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row static-info">
                                <div class="col-md-5 name"> Nombre de Documento: </div>
                                <div class="col-md-7 value">
                                    {{$EntregableRevisar->ENTRnombre_entregable}}
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Responsable(s) : </div>
                                <?php
                                $Responsables = DB::table('sgcsatppasignartareaproyecto as atp')
                                    ->select('usu.USUnombre_usuario','usu.USUapellido_usuario')
                                    ->join('sgcsusupropusuarioproyecto as usupro', 'usupro.USUPROid_usuarioproyecto','atp.USUPROid_usuarioproyecto')
                                    ->join('sgcsusutusuario as usu' , 'usu.USUid_usuario', 'usupro.USUid_usuario')
                                    ->where('atp.ENTRPROid_entregableproyecto',$EntregableRevisar->ENTRPROid_entregableproyecto)
                                    ->groupBy('usu.USUnombre_usuario')
                                    ->groupBy('usu.USUapellido_usuario')
                                    ->get();
                                ?>
                                @foreach($Responsables as $res)
                                    <div class="col-md-5 name"></div>
                                    <div class="col-md-7 value">{{$res->USUnombre_usuario}} {{$res->USUapellido_usuario}}</div>
                                @endforeach

                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Enlace de Documento: </div>
                                <div class="col-md-7 value">
                                    <a target="_blank" href="{{$EntregableRevisar->ENTRREVurl_entregablerevision}}">{{$EntregableRevisar->ENTRREVurl_entregablerevision}}</a>
                                    <input type="hidden" name="ENTRVERenlace_entregableversion" value="{{$EntregableRevisar->ENTRREVurl_entregablerevision}}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Fecha Emitida: </div>
                                <div class="col-md-4 value">
                                    <input type="text" class="form-control disabled text-center" value="{{$EntregableRevisar->ENTRREVfecha_emitida_entregablerevision}}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Fecha de Revision: </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control disabled text-center" name="ENTRVERfecha_emitida_entregableversion" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="row static-info">
                                <div class="col-md-5 name"> Aprobación: </div>
                                <div class="col-md-7 value">
                                    <label class="mt-radio">
                                        <input name="ENTRVERestado_entregableversion" value="1" type="radio"> Si
                                        <span></span>
                                    </label>
                                    <label class="mt-radio">
                                        <input name="ENTRVERestado_entregableversion" value="2" type="radio"> No
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