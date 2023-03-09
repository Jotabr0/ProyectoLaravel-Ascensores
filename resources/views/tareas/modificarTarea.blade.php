@extends('plantilla')
@section('cuerpo')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <h1 class="text-center mb-4">Modificar tarea</h1>
            <form action="{{ route('tarea.update', $tarea->id) }}" method="POST">
                @csrf

                <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->



                @method('PUT')
                <div class="form-group">
                    <label for="cliente_id">Cliente ID:</label>
                    <input type="number" class="form-control @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id" value="{{ $tarea->cliente_id }}">
                    @error('cliente_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="persona_contacto">Persona de contacto:</label>
                    <input type="text" class="form-control @error('persona_contacto') is-invalid @enderror" id="persona_contacto" name="persona_contacto" value="{{ $tarea->persona_contacto }}">
                    @error('persona_contacto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telefono_contacto">Teléfono de contacto:</label>
                    <input type="tel" class="form-control @error('telefono_contacto') is-invalid @enderror" id="telefono_contacto" name="telefono_contacto" value="{{ $tarea->telefono_contacto }}">
                    @error('telefono_contacto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ $tarea->descripcion }}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $tarea->email }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ $tarea->direccion }}">
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poblacion">Población:</label>
                    <input type="text" class="form-control @error('poblacion') is-invalid @enderror" id="poblacion" name="poblacion" value="{{ $tarea->poblacion }}">
                    @error('poblacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" class="form-control @error('codigo_postal') is-invalid @enderror" id="codigo_postal" name="codigo_postal" value="{{ $tarea->codigo_postal }}">
                    @error('codigo_postal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="provincia">Provincia:</label>
                    <input type="text" class="form-control @error('provincia') is-invalid @enderror" id="provincia" name="provincia" value="{{ $tarea->provincia }}">
                    @error('provincia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                        <option value="P" {{ ($tarea->estado == 'P') ? 'selected' : '' }}>Pendiente</option>
                        <option value="R" {{ ($tarea->estado == 'R') ? 'selected' : '' }}>Realizada</option>
                        <option value="C" {{ ($tarea->estado == 'C') ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="operario">Operario:</label>
                    <select class="form-control @error('operario') is-invalid @enderror" id="operario" name="operario">
                        @foreach($operarios as $operario)
                        <option value="{{ $operario->id }}" {{ ($tarea->operario_id == $operario->id) ? 'selected' : '' }}>{{ $operario->name }}</option>
                        @endforeach
                    </select>
                    @error('operario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>




                <div class="form-group">
                    <label for="fecha_realizacion">Fecha Realización:</label>
                    <input type="date" class="form-control @error('fecha_realizacion') is-invalid @enderror" id="fecha_realizacion" name="fecha_realizacion" value="{{ $tarea->fecha_realizacion }}">
                    @error('fecha_realizacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="anotaciones_despues">Anotaciones Después:</label>
                    <textarea class="form-control @error('anotaciones_despues') is-invalid @enderror" id="anotaciones_despues" name="anotaciones_despues" rows="3">{{ $tarea->anotaciones_despues }}</textarea>
                    @error('anotaciones_despues')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('tarea.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection