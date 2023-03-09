@extends('plantilla')
@section('cuerpo')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <h1 class="text-center mb-4">Nuevo cliente</h1>

            

            <form action="{{ route('cliente.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="cif">CIF:</label>
                    <input type="text" class="form-control @error('cif') is-invalid @enderror" id="cif" name="cif" value="{{ old('cif') }}">
                    @error('cif')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                    @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="correo">Correo electrónico:</label>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo') }}">
                    @error('correo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cuenta_corriente">Cuenta corriente:</label>
                    <input type="text" class="form-control @error('cuenta_corriente') is-invalid @enderror" id="cuenta_corriente" name="cuenta_corriente" value="{{ old('cuenta_corriente') }}">
                    @error('cuenta_corriente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pais">País:</label>
                    <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais') }}">
                    @error('pais')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="moneda">Moneda:</label>
                    <input type="text" class="form-control @error('moneda') is-invalid @enderror" id="moneda" name="moneda" value="{{ old('moneda') }}">
                    @error('moneda')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="importe">Importe:</label>
                    <input type="number" step=".01" class="form-control @error('importe') is-invalid @enderror" id="importe" name="importe" value="{{ old('importe') }}">
                    @error('importe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('cliente.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection