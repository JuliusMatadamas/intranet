<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
	<div id="nav-header" class="py-2 px-3 mb-2 bg-light">
		<div class="media d-flex align-items-center">
			<img loading="lazy" src="img/profile.png" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
			<div class="media-body">
				<h4 class="m-0">{{ $usuario }}</h4>
				<p class="font-weight-normal text-muted mb-0">Web developer</p>
			</div>
		</div>
	</div>

    <div id="nav-body">
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
                    home
                </a>
            </li>

            <li class="nav-item">
                <a href="#rhSubmenu" class="dropdown-toggle nav-link text-dark" data-toggle="collapse">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    RH
                </a>

                <ul class="collapse list-unstyled" id="rhSubmenu">
                    <li class="nav-link p-2">
                        <a href="{{ route('rh.planes') }}" class="ml-5">Planes</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
                    services
                </a>
            </li>

            {{--
                Se recorre la variable 'permisos'
                la cual contiene las rutas a las que el usuario
                tienen asignado permitido ingresar por medio del
                navbar
            --}}
            @for($i = 0; $i < count($permisos); $i++)
                {{--
                    Si el menu tiene submenus
                    se creará una lista desplegable
                    dentro del menú
                --}}
                @if( count($permisos[$i]['submenus']) > 0 )
                    {!!
                        '<li class="nav-item">
                            <a class="dropdown-toggle nav-link text-dark" data-toggle="collapse" href="#'. $permisos[$i]['ruta'] .'">'.
                                $permisos[$i]['menu'].
                            '</a>
                            <ul class="collapse list-unstyled" id="'. $permisos[$i]['ruta'] .'">'
                    !!}
                    {{--
                        Se recorre cada uno de los
                        elementos del submenu
                        para mostrarlos en la lista
                        de elementos
                    --}}
                        @for($j = 0; $j < count($permisos[$i]['submenus']); $j++)
                            {!!
                                '<li class="nav-link p-2">
                                    <a href="#">'. $permisos[$i]['submenus'][$j]['submenu'] .'</a>
                                </li>'
                            !!}
                        @endfor
                    {!!
                                '
                            </ul>
                        </li>'
                    !!}
                @endif
            @endfor
        </ul>
    </div>
</div>
<!-- End vertical navbar -->