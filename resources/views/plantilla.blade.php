<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'SIEMPRE COLGADOS S.L'</title>
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        #paginacion {
            margin: 0 auto;
            text-align: center;
            margin-bottom: 50px;
        }

        footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 100px;
        }

        body {
            overflow: auto;

        }

        header {
            margin-bottom: 60px;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-center text-white">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <img src="{{ asset('assets/img/logoempresa.png') }}" alt="Logo Empresa" style="width: 70px;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <h1 class="navbar-brand " style="font-size: 1.5em;">SIEMPRE COLGADOS S.L.</h1>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if (Auth::check())
                    <ul class="navbar-nav ml-auto" style="margin-top: 10px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn linkhead" href="" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class=" linkhead" style="font-size: 1.5em;"> Tareas</span>
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item btn text-start" href="{{ route('tarea.create') }}" style="font-size: 1.5em;"> Nueva Tarea</a>
                                <a class="dropdown-item btn text-start" href="{{ route('tarea.index') }}" style="font-size: 1.5em;"> Lista Tareas</a>
                                {{-- @if(Auth::user()->tipo == 'administrador') --}}

                                <a class="dropdown-item btn text-start" href="{{ route('tarea.verPendientes') }}" style="font-size: 1.5em;"> Tareas Pendientes</a>

                                {{-- @endif --}}
                            </div>
                        </li>
                        
                        {{-- @if(Auth::user()->tipo == 'administrador') --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn  linkhead" href="" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="linkhead" style="font-size: 1.5em;"> Clientes</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item btn text-start" href="{{ route('cliente.create') }}" style="font-size: 1.5em;"> Nuevo Cliente</a>
                                <a class="dropdown-item btn text-start" href="{{ route('cliente.index') }}" style="font-size: 1.5em;"> Lista Clientes</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn linkhead" href="" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="linkhead" style="font-size: 1.5em;"> Cuotas</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item btn text-start" href="{{ route('cuota.index') }}" style="font-size: 1.5em;"> Lista Cuotas</a>
                                <a class="dropdown-item btn text-start" href="" style="font-size: 1.5em;"> Remesa Excepcional</a>
                                <!-- <a class="dropdown-item btn text-start" href="" style="font-size: 1.5em;"> Nueva Remesa</a> -->

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn linkhead" href="" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="linkhead" style="font-size: 1.5em;"> Empleados</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                {{-- @if(Auth::user()->tipo == 'administrador') --}}
                                <a class="dropdown-item btn text-start" href="{{ route('user.create') }}" style="font-size: 1.5em;"> Nuevo Empleado</a>
                                <a class="dropdown-item btn text-start" href="{{ route('user.index') }}" style="font-size: 1.5em;"> Lista Empleados</a>


                                {{-- @endif --}}

                            </div>
                        </li>
                        {{-- @endif --}}
                    </ul>
                    @endif
                    <ul class="nav navbar-nav navbar-right" style="margin-top: 5px;">
                        @if (Auth::check())
                        <div id="sesion">
                            <p class="navbar-text">Usuario: <span class="infosesion">{{ Auth::user()->name }}</span></p>
                            <p class="navbar-text">Nivel: <span class="infosesion">{{ Auth::user()->tipo }}</span></p>
                            {{-- @if (session()->has('hora')) --}}
                            <p class="navbar-text">Sesión: <span class="infosesion">{{session('hora')}}</span></p>
                            {{-- @endif --}}
                        </div>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                            @csrf
                            <input type="hidden" name="_method" value="POST">
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-log-out"></span> Salir
                            </button>

                        </form>
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    @yield('cuerpo')


    <footer class="bg-dark text-light">
        <div class="container py-4">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start">
                    <h5 class="text-uppercase">SIEMPRE COLGADOS S.L.</h5>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <a class="text-light me-3" href="#">Política de privacidad</a>
                    <span class="text-muted">|</span>
                    <a class="text-light ms-3" href="#">Términos y condiciones</a>
                </div>
            </div>
            <div class="text-center mt-3">
                © {{ date('Y') }} SIEMPRE COLGADOS S.L. Todos los derechos reservados.
            </div>
        </div>
    </footer>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   


</body>



</html>