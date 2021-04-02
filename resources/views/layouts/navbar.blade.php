<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
	<div id="nav-header" class="py-2 px-3 mb-2 bg-light">
		<div class="media d-flex align-items-center">
			<img loading="lazy" src="{{ asset('img/profile.png') }}" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
			<div class="media-body">
				<h4 class="m-0">{{ $usuario }}</h4>
				<p class="font-weight-normal text-muted mb-0">{{ $puesto->puesto }}</p>
			</div>
		</div>
	</div>

    <div id="nav-body">
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Navegación</p>

        <ul class="nav flex-column bg-white mb-0">
            @foreach( $permisos as $permiso )
            <li class="nav-item">
                <a href="#{{ $permiso['id_submenu'] }}" class="dropdown-toggle nav-link text-dark" data-toggle="collapse">
                    <i class="{{ $permiso['icon'] }} mr-3 text-dark fa-fw"></i>
                    {{ $permiso['menu'] }}
                </a>

                <ul class="collapse list-unstyled" id="{{ $permiso['id_submenu'] }}">
                    @foreach( $permiso['submenus'] as $submenu )
                    <li class="nav-link p-2">
                        <a href="{{ route($submenu['ruta']) }}" class="ml-5">{{ $submenu['submenu'] }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- End vertical navbar -->