<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    

    <!-- Styles -->
    

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>


    @auth
    <p>Estás autenticado.</p>
    @else
    <p>No estás autenticado.</p>
    @endauth

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cliente ID</th>
                        <th>Persona Contacto</th>
                        <th>Teléfono Contacto</th>
                        <th>Descripción</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Población</th>
                        <th>Código Postal</th>
                        <th>Provincia</th>
                        <th>Estado</th>
                        <th>Fecha Creación</th>
                        <th>Operario</th>
                        <th>Fecha Realización</th>
                        <th>Anotaciones Antes</th>
                        <th>Anotaciones Después</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->cliente_id }}</td>
                        <td>{{ $tarea->persona_contacto }}</td>
                        <td>{{ $tarea->telefono_contacto }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->email }}</td>
                        <td>{{ $tarea->direccion }}</td>
                        <td>{{ $tarea->poblacion }}</td>
                        <td>{{ $tarea->codigo_postal }}</td>
                        <td>{{ $tarea->provincia }}</td>
                        <td>{{ $tarea->estado }}</td>
                        <td>{{ $tarea->fecha_creacion }}</td>
                        <td>{{ $tarea->operario }}</td>
                        <td>{{ $tarea->fecha_realizacion }}</td>
                        <td>{{ $tarea->anotaciones_antes }}</td>
                        <td>{{ $tarea->anotaciones_despues }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>