@if(count($xGstringMetodologiaProyecto) > 0)
    <li class="active">
        <a href="{{route('InfoProyecto',$xGstringProyectosAsignado)}}"> Proyecto </a>
    </li>
    <li>
        <a href="{{route('EquipoProyecto',$xGstringProyectosAsignado)}}"> Equipo </a>
    </li>
    <li>
        <a href="{{route('EntregableProyecto',$xGstringProyectosAsignado)}}"> Entregables </a>
    </li>
    <li>
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
@else
    <li class="active">
        <a href="{{route('InfoProyecto',$xGstringProyectosAsignado)}}"> Proyecto </a>
    </li>
    <li>
        <a name="{{route('EquipoProyecto',$xGstringProyectosAsignado)}}"> Equipo </a>
    </li>
    <li>
        <a name="{{route('EntregableProyecto',$xGstringProyectosAsignado)}}"> Entregables </a>
    </li>
    <li>
        <a name="{{route('GestionarTareaProyecto',$xGstringProyectosAsignado)}}"> Tareas </a>
    </li>
    <li>
        <a name="{{route('ComiteCambio',$xGstringProyectosAsignado)}}"> Comite de Cambio </a>
    </li>
    <li>
        <a name="{{route('EstadoProyecto',$xGstringProyectosAsignado)}}"> Estado de Proyecto </a>
    </li>
    <li>
        <a name="{{route('RevisionDocumento',$xGstringProyectosAsignado)}}"> Revision Documento </a>
    </li>
@endif