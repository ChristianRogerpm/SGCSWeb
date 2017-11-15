@extends('layouts.template')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption font-light">
                        <i class="icon-settings font-light"></i>
                        <span class="caption-subject bold uppercase">Lista de Entregables Asignados</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                        <thead>
                        <tr>
                            <th class="all">Proyecto</th>
                            <th class="min-tablet">Fase</th>
                            <th class="min-tablet">Entregable</th>
                            <th class="min-tablet">Progreso</th>
                            <th class="all">Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($xGstringEntregablesAsignado as $xGstringEntregablesAsignados)
                            <tr>
                                <td>
                                    {{$xGstringEntregablesAsignados->PROnombre_proyecto}}
                                </td>
                                <td>{{$xGstringEntregablesAsignados->FAnombre_fase}}</td>
                                <td>{{$xGstringEntregablesAsignados->ENTRnombre_entregable}}</td>
                                <td>
                                    @foreach($contandoFinalizados as $cont)
                                        @if($cont->ENTRid_entregable == $xGstringEntregablesAsignados->ENTRid_entregable)
                                        <?php
                                            $total = DB::table('sgcsatppasignartareaproyecto as atp')
                                                ->selectRaw('count(atp.ATPid_asignartareaproyecto) as total')
                                                ->join('sgcstaptareaproyecto as tapro' , 'tapro.TAid_tarea', 'atp.TAid_tarea')
                                                ->join('sgcsentrpropentregableproyecto as entpro' , 'entpro.ENTRPROid_entregableproyecto', 'tapro.ENTPROid_entregableproyecto')
                                                ->join('sgcsentrtentregable as entre' , 'entre.ENTRid_entregable', 'entpro.ENTRid_entregable')
                                                ->where('entre.ENTRid_entregable', $cont->ENTRid_entregable)
                                                ->get();
                                        ?>
                                            @foreach($total as $totales)
                                                <button class="btn btn-primary btn-block disabled">{{round($porcentaje  = ($cont->finalizados * 100)/ ($totales->total))}}%</button>
                                            @endforeach

                                        @else

                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">

                                            @foreach($contandoFinalizados as $cont)
                                                @if($cont->ENTRid_entregable == $xGstringEntregablesAsignados->ENTRid_entregable)
                                                    <?php
                                                    $total = DB::table('sgcsatppasignartareaproyecto as atp')
                                                        ->selectRaw('count(atp.ATPid_asignartareaproyecto) as total')
                                                        ->join('sgcstaptareaproyecto as tapro' , 'tapro.TAid_tarea', 'atp.TAid_tarea')
                                                        ->join('sgcsentrpropentregableproyecto as entpro' , 'entpro.ENTRPROid_entregableproyecto', 'tapro.ENTPROid_entregableproyecto')
                                                        ->join('sgcsentrtentregable as entre' , 'entre.ENTRid_entregable', 'entpro.ENTRid_entregable')
                                                        ->where('entre.ENTRid_entregable', $cont->ENTRid_entregable)
                                                        ->get();
                                                    ?>

                                                        <li>
                                                            <a data-toggle="modal" href="#generate{{$xGstringEntregablesAsignados->ENTRid_entregable}}">
                                                                <i class="fa fa-info-circle"></i>Generar Revision Entregable</a>

                                                        </li>

                                                @else
                                                @endif
                                            @endforeach
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-book"></i>Version Entregable
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('TareasAsignadas',$xGstringEntregablesAsignados->ENTRid_entregable)}}">
                                                    <i class="fa fa-book"></i>Tareas
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @include('Participante.Modals.FrmModalGenerarEntregable')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

{{--@section('scripts')--}}
    {{--<script>--}}
         {{--var numvar =;--}}
         {{--var dqwd = "fea";--}}

        {{--console.log(dqwd);--}}

        {{--$.ajax({--}}
            {{--url: 'cargarDatos.php',--}}
            {{--type: 'GET',--}}
            {{--dataType: 'json',--}}
            {{--data: { id : $('#cambiar').val() }--}}
        {{--})--}}
    {{--</script>--}}
{{--@endsection--}}