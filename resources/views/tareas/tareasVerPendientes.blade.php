@extends('plantilla')
@section('cuerpo')
<section class="cuerpo">
    <h1>Tareas Pendientes</h1>
    <br>
    @if($tareas->isEmpty())
    <br>
    <div class="alert alert-primary w-25 mx-auto" role="alert">
        <strong>No hay tareas que listar</strong>
    </div>
    @else

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
                <th>Acciones</th>
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
                <td>
                    <a href="{{ route('tarea.edit', $tarea->id) }}" class="btn btn-warning">Modificar</a>
                    <form action="{{ route('tarea.destroy', $tarea->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?')">Eliminar</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>



    <div id="paginacion">
        {{ $tareas->links('custom-pagination') }}
    </div>
    @endif
</section>
@endsection