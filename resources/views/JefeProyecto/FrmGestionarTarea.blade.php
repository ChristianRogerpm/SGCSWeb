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
                                @include('JefeProyecto.ContenidoPestaña.FrmPestañaGestionarTarea')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </row>
@endsection