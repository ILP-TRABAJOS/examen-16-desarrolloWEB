<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    {{-- datatables --}}

    <link href="{{ asset('datatables/css/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('datatables/css/responsive.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('estilos.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- notify --}}
    <link href="{{('notify/css/pnotify.css')}}" rel="stylesheet" />
    <link href="{{('notify/css/pnotify.buttons.css')}}" rel="stylesheet" />
    <link href="{{('notify/css/custom.min.css')}}" rel="stylesheet" />
    {{-- <script src="{{('notify/js/jquery.min.js')}}">
    </script> --}}
    <script src="{{('notify/js/pnotify.js')}}">
    </script>
    <script src="{{('notify/js/pnotify.buttons.js')}}">
    </script>

    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
    @if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <b>InfyOm</b>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="data:image/jpeg;base64,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"
                                    class="user-image" alt="User Image" />
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->usuario }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="data:image/jpeg;base64,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"
                                        class="img-circle" alt="User Image" />
                                    <p>
                                        {{ Auth::user()->usuario }}
                                        <small>Member since {{ Auth::user()->usuario }}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div style="padding: 0px 5px 35px 5px;height: 100vh;overflow-y: scroll;overflow-x: hidden" id="contenido"
            class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

    </div>
    @else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>



    {{-- datatables --}}

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('datatables/js/popper.min.js') }}">
    </script>
    <script src="{{ asset('datatables/js/datatables.min.js') }}">
    </script>
    <script src="{{ asset('datatables/js/responsive.min.js') }}">
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('datatables/js/popper.min.js') }}">
    </script>
    <script src="{{ asset('datatables/js/datatables.min.js') }}">
    </script>
    <script src="{{ asset('datatables/js/responsive.min.js') }}">
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
        });

    </script>

    @stack('scripts')
</body>

</html>