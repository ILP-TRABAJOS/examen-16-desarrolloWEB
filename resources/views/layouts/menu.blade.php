<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('usuarios.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp;<span>USUARIO</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('pacientes.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-restroom"></i>&nbsp;&nbsp;&nbsp;<span>PACIENTE</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('doctor.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-user-nurse"></i>&nbsp;&nbsp;&nbsp;<span>DOCTOR</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('citas.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-book-medical"></i>&nbsp;&nbsp;&nbsp;<span>CITAS</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('citas-detalle.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="far fa-address-book"></i>&nbsp;&nbsp;&nbsp;<span>CITAS DETALLES</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('consultas.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;&nbsp;<span>CONSULTAS</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('busqueda.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;<span>BUSQUEDAS</span>
    </a>
</li>

<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{route('reportes.index')}}"
        style="{{ Request::is('home*') ? 'border-left:solid 2px #00C4FD!important;' : '' }}">
        <i class="fas fa-file-pdf"></i>&nbsp;&nbsp;&nbsp;<span>REPORTES</span>
    </a>
</li>
