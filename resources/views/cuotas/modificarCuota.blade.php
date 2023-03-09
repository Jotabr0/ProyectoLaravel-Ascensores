@extends('plantilla')
@section('cuerpo')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <h1 class="text-center mb-4">Modificar cuota</h1>
            <form action="{{ route('cuota.update', $cuota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="concepto">Concepto:</label>
                    <input type="text" class="form-control @error('concepto') is-invalid @enderror" id="concepto" name="concepto" value="{{ $cuota->concepto }}" >
                    @error('concepto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="importe">Importe:</label>
                    <input type="number" class="form-control @error('importe') is-invalid @enderror" id="importe" name="importe" value="{{ $cuota->importe }}" >
                    @error('importe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="pagada">Pagada:</label>
                    <select class="form-control @error('pagada') is-invalid @enderror" id="pagada" name="pagada" >
                        <option value="No" @if(!$cuota->pagada) selected @endif>No</option>
                        <option value="Si" @if($cuota->pagada) selected @endif>Sí</option>
                    </select>
                    @error('pagada')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="notas">Notas:</label>
                    <textarea class="form-control @error('notas') is-invalid @enderror" id="notas" name="notas" rows="3">{{ $cuota->notas }}</textarea>
                    @error('notas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('cuota.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection