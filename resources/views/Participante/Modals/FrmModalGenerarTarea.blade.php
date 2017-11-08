<div class="modal fade bs-modal-lg" id="large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Generar Revision de Tarea</h4>
            </div>


            <div class="modal-body">

                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="#" class="horizontal-form">
                        <div class="form-body">
                            <h3 class="form-section">Tarea: {{$xGstringTareasAsignadass->TAnombre_tarea}}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Entregable</label>
                                        <input type="text" id="firstName" disabled class="form-control" value="{{$xGstringTareasAsignadass->ENTRnombre_entregable}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">URL</label>
                                        <input type="text" id="firstName" class="form-control" placeholder="Ingrese URL">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Autor:</label>
                                        <input type="text" id="firstName" class="form-control" disabled value="{{Auth::user()->USUnombre_usuario}} {{Auth::user()->USUapellido_usuario}}">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Fecha</label>
                                        <input type="text" class="form-control" disabled value="{{ date('Y-m-d') }}"> </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Observación</label>
                                        <textarea style="resize:none" class="form-control" name="ENTRdescripcion_entregable" rows="5" placeholder="Ingrese descripción"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                {{--<div class="form-actions right">--}}
                {{--<button type="button" class="btn default">Cancel</button>--}}
                {{--<button type="submit" class="btn blue">--}}
                {{--<i class="fa fa-check"></i> Save</button>--}}
                {{--</div>--}}
                </form>
                <!-- END FORM-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn green">ENVIAR</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>