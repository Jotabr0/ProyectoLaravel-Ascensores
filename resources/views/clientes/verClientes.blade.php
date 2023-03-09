@extends('plantilla')

@section('cuerpo')
<h1>Lista de clientes</h1>

<br>

@if($clientes->isEmpty())
<br>
<div class="alert alert-primary w-25 mx-auto" role="alert">
    <strong>No hay clientes que listar</strong>
</div>
@else
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('cliente.create') }}" class="btn btn-primary me-md-3">Añadir Cliente</a>
</div>

<table id="clientes-table" class="table table-striped">
    <thead>
        <tr>
            <th>CIF</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
            <th>Cuenta corriente</th>
            <th>País</th>
            <th>Moneda</th>
            <th>Importe</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->CIF }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>{{ $cliente->correo }}</td>
            <td>{{ $cliente->cuenta_corriente }}</td>
            <td>{{ $cliente->pais }}</td>
            <td>{{ $cliente->moneda }}</td>
            <td>{{ $cliente->importe }}</td>
            <td>
                <!-- <a href="{{ route('cliente.edit', $cliente->id) }}" class="btn btn-primary btn-sm me-2">Editar</a> -->
                <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div id="paginacion" style="margin-bottom: 50px;">
    {{ $clientes->links('custom-pagination') }}
</div>
@endif
@endsection