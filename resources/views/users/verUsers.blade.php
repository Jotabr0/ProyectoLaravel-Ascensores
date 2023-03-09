@extends('plantilla')
@section('cuerpo')
<h1>Lista de empleados</h1>
<br>
@if($users->isEmpty())
<br>
<div class="alert alert-primary w-25 mx-auto" role="alert">
    <strong>No hay usuarios que listar</strong>
</div>
@else


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('user.create') }}" class="btn btn-primary me-md-3">Alta Cliente</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->dni }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->telefono }}</td>
            <td>{{ $user->direccion }}</td>
            <td>{{ $user->tipo }}</td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Modificar</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres dar de baja a este usuario?')">Dar de baja</button>
                </form>
            </td>



        </tr>
        @endforeach
    </tbody>

</table>
<div id="paginacion">
    {{ $users->links('custom-pagination') }}
</div>
@endif
@endsection