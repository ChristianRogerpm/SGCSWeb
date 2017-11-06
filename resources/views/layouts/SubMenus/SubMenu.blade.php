@if(Auth::user()->USUtipo_usuario == 1)
    <li class="nav-item start active open ">
        <a href="{{route('home')}}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Inicio</span>
        </a>
    </li>
    <li class="heading">
        <h3 class="uppercase">Gestión de Proyectos</h3>
    </li>
    <li class="nav-item">
        <a href="{{route('proyecto')}}" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Proyectos</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('metodologia')}}" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Metodología</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('fase')}}" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Fases</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('entregable')}}" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Entregables</span>
        </a>
    </li>

    <li class="heading">
        <h3 class="uppercase">Gestión de Cambios</h3>
    </li>
    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Solicitudes de Cambio</span>
        </a>
    </li>

    <li class="heading">
        <h3 class="uppercase">Gestión de Usuarios</h3>
    </li>
    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Gestionar Usuario</span>
        </a>
    </li>
@else
    <li class="nav-item start active open ">
        <a href="{{route('home')}}" class="nav-link nav-toggle">
            <i class="icon-home"></i>
            <span class="title">Inicio</span>
        </a>
    </li>
    <li class="heading">
        <h3 class="uppercase">Proyectos</h3>
    </li>
    <li class="nav-item">
        <a href="{{route('ProyectosAsignados',Auth::user()->USUid_usuario)}}" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Proyectos</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Entregables</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Tareas</span>
        </a>
    </li>

    <li class="heading">
        <h3 class="uppercase">Cambios</h3>
    </li>

    <li class="nav-item">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-folder"></i>
            <span class="title">Solicitud de Cambios</span>
        </a>
    </li>
@endif
