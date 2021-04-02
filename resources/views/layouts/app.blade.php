<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @guest
            @yield('content')
        @else
            @include('layouts.navbar')
            <div class="page-content p-4" id="content">
                <h1 class="text-center">Intranet</h1>
                <nav class="navbar navbar-expand-md navbar-light bg-transparent">
                    <div class="container">
                        <!-- Toggle button -->
                        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white shadow-sm px-4" @click="showHideNav()">
                            <i class="fa fa-bars mr-2"></i>
                            <small class="text-uppercase font-weight-bold">Toggle</small>
                        </button>

                        <!-- Navbar-toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <!-- User-info -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ $usuario }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right users" aria-labelledby="navbarDropdown">
                                        <header>
                                            <div class="content">
                                                <div class="details">
                                                    <p>Activo</p>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-danger bg-danger shadow-sm px-4 mb-4" data-toggle="modal" data-target="#logOutModal">
                                                <small class="text-uppercase font-weight-bold">Logout</small>
                                            </button>
                                        </header>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('content')
            </div>
            @include('layouts.modal')
        @endguest
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
