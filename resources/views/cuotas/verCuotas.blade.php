@extends('plantilla')
@section('cuerpo')
<h1>Lista de cuotas</h1>

<br>
@if($cuotas->isEmpty())
<br>
<div class="alert alert-primary w-25 mx-auto" role="alert">
    <strong>No hay cuotas que listar</strong>
</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('cuota.generarCuotas') }}" class="btn btn-primary me-md-3">Remesa mensual</a>
</div>

@else

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('cuota.generarCuotas') }}" class="btn btn-primary me-md-3">Remesa mensual</a>
</div>



<table id="cuotas-table" class="table table-striped">
    <thead>
        <tr>
            <th>Cuota ID</th>
            <th>Concepto</th>
            <th>Fecha Emisión</th>
            <th>Importe</th>
            <th>Pagada</th>
            <th>Fecha Pago</th>
            <th>Notas</th>
            <th>Cliente ID</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($cuotas as $cuota)
        <tr>
            <td>{{ $cuota->id }}</td>
            <td>{{ $cuota->concepto }}</td>
            <td>{{ $cuota->fecha_emision }}</td>
            <td>{{ $cuota->importe }} €</td>
            <td>{{ $cuota->pagada }}</td>
            <td>{{ $cuota->fecha_pago }}</td>
            <td>{{ $cuota->notas }}</td>
            <td>{{ $cuota->cliente_id }}</td>
            

            <td>
                <a href="{{ route('cuota.edit', $cuota->id) }}" class="btn btn-warning">Modificar</a>
                <form action="{{ route('cuota.destroy', $cuota->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta cuota?')">Eliminar</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>



<div id="paginacion" style="margin-bottom: 50px;">
    {{ $cuotas->links('custom-pagination') }}
</div>



@endif
@endsection