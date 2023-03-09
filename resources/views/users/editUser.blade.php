@extends('plantilla')
@section('cuerpo')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <h1 class="text-center mb-4">Modificar empleado</h1>
<form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf



    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @method('PUT')
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
    </div>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
    </div>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password" value="{{ $user->password }}">
    </div>
    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    


    <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select class="form-control" id="tipo" name="tipo">
            <option value="Operario" {{ $user->tipo == 'Operario' ? 'selected' : '' }}>Operario</option>
            <option value="Administrador" {{ $user->tipo == 'Administrador' ? 'selected' : '' }}>Administrador</option>
        </select>
    </div>
    @error('tipo')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="form-group">
        <label for="dni">DNI:</label>
        <input type="text" class="form-control" id="dni" name="dni" value="{{ $user->dni }}">
    </div>
    @error('dni')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $user->direccion }}">
    </div>
    @error('direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="number" class="form-control" id="telefono" name="telefono" value="{{ $user->telefono }}">
    </div>
    @error('telefono')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror




    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>

</form>
        </div>
    </div>
</div>
@endsection