
<div class="modal fade bs-modal-lg" id="detail{{$xGstringTareasAsignadass->ATPid_asignartareaproyecto}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Detalle de Tarea</h4>
            </div>


            <div class="modal-body">

                <div class="portlet-body form">

                    @foreach($xGstringDetalleTareasAsignada as $xGstringDetalleTareasAsignadas)

                        @if($xGstringDetalleTareasAsignadas->ATPid_asignartareaproyecto == $xGstringTareasAsignadass->ATPid_asignartareaproyecto)

                            <form action="#" class="horizontal-form">
                                <div class="form-body">
                                    <h3 class="form-section">Tarea: {{$xGstringTareasAsignadass->TAnombre_tarea}}</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nombre de Proyecto</label>
                                                <input type="text" id="firstName" disabled class="form-control" value="{{$xGstringDetalleTareasAsignadas->PROnombre_proyecto}}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Metodologia de Proyecto</label>
                                                <input type="text" class="form-control" disabled value="{{$xGstringDetalleTareasAsignadas->METnombre_metodologia}}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Fase:</label>
                                                <input type="text" id="firstName" class="form-control" disabled value="{{$xGstringDetalleTareasAsignadas->FAnombre_fase}}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Entregable</label>
                                                <input type="text" class="form-control" disabled value="{{$xGstringDetalleTareasAsignadas->ENTRnombre_entregable}}">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nombre de Tarea</label>
                                                <input type="text" class="form-control" disabled value="{{$xGstringDetalleTareasAsignadas->TAnombre_tarea}}">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Fecha</label>
                                                @if($xGstringDetalleTareasAsignadas->ATPestado_tareaproyecto == 1)
                                                    <input type="text" class="form-control" disabled value="EN CURSO">
                                                @elseif($xGstringDetalleTareasAsignadas->ATPestado_tareaproyecto == 2)
                                                    <input type="text" class="form-control" disabled value="FINALIZADO">
                                                @else
                                                    <input type="text" class="form-control" disabled value="CANCELADO">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Descripción de Tarea</label>
                                                <textarea style="resize:none" class="form-control" name="ENTRdescripcion_entregable" rows="5">{{$xGstringDetalleTareasAsignadas->TAdescripcion_tarea}}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>

                        @endif
                    @endforeach
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>