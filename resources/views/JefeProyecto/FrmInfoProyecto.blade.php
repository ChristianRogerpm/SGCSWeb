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
                            @include('JefeProyecto.Pestañas.FrmPestañas')
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="InfoProyecto">
                                @include('JefeProyecto.ContenidoPestaña.FrmPestañaProyecto')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </row>
@endsection