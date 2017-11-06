
@extends('layouts.template')
@section('content')
    <row>
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Planificación de Proyecto </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable-custom ">
                        <ul class="nav nav-tabs ">
                            <li >
                                <a href="{{route('InfoProyecto',$xGstringProyectosAsignado)}}"> Proyecto </a>
                            </li>
                            <li>
                                <a href="{{route('EquipoProyecto',$xGstringProyectosAsignado)}}"> Equipo </a>
                            </li>
                            <li>
                                <a href="{{route('EntregableProyecto',$xGstringProyectosAsignado)}}"> Entregables </a>
                            </li>
                            <li class="active">
                                <a href="{{route('GestionarTareaProyecto',$xGstringProyectosAsignado)}}"> Tareas </a>
                            </li>
                            <li>
                                <a href="{{route('ComiteCambio',$xGstringProyectosAsignado)}}"> Comite de Cambio </a>
                            </li>
                            <li>
                                <a href="{{route('EstadoProyecto',$xGstringProyectosAsignado)}}"> Estado de Proyecto </a>
                            </li>
                            <li>
                                <a href="{{route('RevisionDocumento',$xGstringProyectosAsignado)}}"> Revision Documento </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="InfoProyecto">
                                <div class="portlet box blue">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Gestionar Tareas </div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tabbable-line">
                                            <ul class="nav nav-tabs ">
                                                <li>
                                                    <a href="{{route('GestionarTareaProyecto',$xGstringProyectosAsignado)}}"> Registrar Tareas </a>
                                                </li>
                                                <li class="active">
                                                    <a href="{{route('RelacionarTareaProyecto',$xGstringProyectosAsignado)}}"> Trazabilidad de Tareas </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('AsignarTareaProyecto',$xGstringProyectosAsignado)}}"> Asignar Tareas </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_15_1">
                                                    @include('JefeProyecto.ContenidoPestaña.SubPestaña.FrmRelacionarTarea')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </row>
@endsection



@section('scripts')
    <script>
        $('#Fase_1').on('change',function (e) {
            //console.log(e);
            var FAid_fase = e.target.value;
            console.log(FAid_fase);
            $.get('/CargarEntregableTareaProyecto?FAid_fase='+FAid_fase,function (data){
                $('#Entregable_1').empty();
                $('#Tarea_1').empty();
                $('#Tarea_1').append('<option value="'+'0'+'">'+'Seleccione una Tarea'+'</option>');
                $('#Entregable_1').append('<option value="'+'0'+'">'+'Seleccione un Entregable'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Entregable_1').append('<option value="'+subfase.ENTRPROid_entregableproyecto+'">'+subfase.ENTRnombre_entregable+'</option>');
                });
            });
        });

        $('#Entregable_1').on('change',function (e) {
            //console.log(e);
            var ENTPROid_entregableproyecto = e.target.value;
            console.log(ENTPROid_entregableproyecto);
            $.get('/CargarTareaProyecto?ENTPROid_entregableproyecto='+ENTPROid_entregableproyecto,function (data){
                $('#Tarea_1').empty();
                $('#Tarea_1').append('<option value="'+'0'+'">'+'Seleccione una Tarea'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Tarea_1').append('<option value="'+subfase.TAid_tarea+'">'+subfase.TAnombre_tarea+'</option>');
                });
            });
        });

        $('#Fase_2').on('change',function (e) {
            //console.log(e);
            var FAid_fase = e.target.value;
            console.log(FAid_fase);
            $.get('/CargarEntregableTareaProyecto?FAid_fase='+FAid_fase,function (data){
                $('#Entregable_2').empty();
                $('#Tarea_2').empty();
                $('#Tarea_2').append('<option value="'+'0'+'">'+'Seleccione una Tarea'+'</option>');
                $('#Entregable_2').append('<option value="'+'0'+'">'+'Seleccione un Entregable'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Entregable_2').append('<option value="'+subfase.ENTRPROid_entregableproyecto+'">'+subfase.ENTRnombre_entregable+'</option>');
                });
            });
        });

        $('#Entregable_2').on('change',function (e) {
            //console.log(e);
            var ENTPROid_entregableproyecto = e.target.value;
            console.log(ENTPROid_entregableproyecto);
            $.get('/CargarTareaProyecto?ENTPROid_entregableproyecto='+ENTPROid_entregableproyecto,function (data){
                $('#Tarea_2').empty();
                $('#Tarea_2').append('<option value="'+'0'+'">'+'Seleccione una Tarea'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Tarea_2').append('<option value="'+subfase.TAid_tarea+'">'+subfase.TAnombre_tarea+'</option>');
                });
            });
        });

    </script>
@endsection

