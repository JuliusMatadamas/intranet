@extends('layouts.app')

@section('content')
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
	<div class="py-4 px-3 mb-4 bg-light">
		<div class="media d-flex align-items-center">
			<img loading="lazy" src="img/profile.png" alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
			<div class="media-body">
				<h4 class="m-0">{{ $usuario }}</h4>
				<p class="font-weight-normal text-muted mb-0">Web developer</p>
			</div>
		</div>
	</div>

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

        <li class="nav-item">
        	<a href="#" class="nav-link text-dark">
        		<i class="fa fa-picture-o mr-3 text-primary fa-fw"></i>
                Gallery
            </a>
        </li>
    </ul>

    <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

    <ul class="nav flex-column bg-white mb-0">
    	<li class="nav-item">
    		<a href="#" class="nav-link text-dark">
    			<i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                area charts
            </a>
        </li>

        <li class="nav-item">
        	<a href="#" class="nav-link text-dark">
        		<i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                bar charts
            </a>
        </li>

        <li class="nav-item">
        	<a href="#" class="nav-link text-dark">
                <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                pie charts
            </a>
        </li>

        <li class="nav-item">
        	<a href="#" class="nav-link text-dark">
                <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                line charts
            </a>
        </li>
    </ul>
</div>
<!-- End vertical navbar -->

<div class="page-content p-5" id="content">
	<!-- Toggle button -->
	<button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4" @click="showHideNav()">
		<i class="fa fa-bars mr-2"></i>
		<small class="text-uppercase font-weight-bold">Toggle</small>
	</button>

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, facere facilis nemo non odio placeat sequi. Ad amet culpa distinctio eligendi excepturi, impedit ipsum obcaecati provident, repudiandae similique voluptas, voluptate?</p>
    <form action="{{ route('logout')  }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-block btn-dark">Log-out</button>
            </div>
        </div>
    </form>
</div>
@endsection
