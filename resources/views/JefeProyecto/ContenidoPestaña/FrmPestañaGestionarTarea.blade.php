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
        @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
        @endif
        <div class="tabbable-line">
            <ul class="nav nav-tabs ">
                <li class="active">
                    <a href="{{route('GestionarTareaProyecto',$xGstringProyectosAsignado)}}"> Registrar Tareas </a>
                </li>
                <li>
                    <a href="{{route('RelacionarTareaProyecto',$xGstringProyectosAsignado)}}"> Relacionar Tareas </a>
                </li>
                <li>
                    <a href="{{route('AsignarTareaProyecto',$xGstringProyectosAsignado)}}"> Asignar Tareas </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="tab_15_1">
                    @if(isset($xGstringEditarTareaProyecto))
                        @include('JefeProyecto.ContenidoPestaña.SubPestaña.FrmEditarRegistroTarea')
                    @else
                        @include('JefeProyecto.ContenidoPestaña.SubPestaña.FrmRegistrarTarea')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <script>
        $('#Fase').on('change',function (e) {
            //console.log(e);
            var FAid_fase = e.target.value;
            var Project = document.getElementById('Proyecto').value
            console.log(FAid_fase);
            console.log(Project);
            $.get('/CargarEntregableTareaProyecto?FAid_fase='+FAid_fase+'&Proyecto='+Project,function (data){
                $('#Entregable').empty();
                $('#Entregable').append('<option value="'+'0'+'">'+'Seleccione un Entregable'+'</option>');
                $.each(data,function (index,subfase){
                    $('#Entregable').append('<option value="'+subfase.ENTRPROid_entregableproyecto+'">'+subfase.ENTRnombre_entregable+'</option>');
                });
            });
        });
        $('#Entregable').on('change',function (e) {
            document.getElementById("TAnombre_tarea").value = "";
            document.getElementById("TAdescripcion_tarea").value = "";
        })

    </script>
@endsection

