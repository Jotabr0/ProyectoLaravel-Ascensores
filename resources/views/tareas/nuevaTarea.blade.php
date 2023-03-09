@extends('plantilla')
@section('cuerpo')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
            <h1 class="text-center mb-4">Nueva tarea</h1>

            <!-- @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif -->

            <!-- @if($errors->has('cliente'))
            <div class="alert alert-danger">{{ $errors->first('cliente') }}</div>
            @endif -->



            <form action="{{ route('tarea.store') }}" method="POST">
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
                @error('cliente')
                <div class="alert alert-danger">
                    <ul>
                        
                        <li>{{ $message }}</li>
                        
                    </ul>
                </div>
                @enderror


                @if (Auth::check())
                <div class="form-group">
                    <label for="cliente_id">Cliente ID:</label>
                    <select class="form-control @error('cliente_id') is-invalid @enderror" id="cliente_id" name="cliente_id">
                        <option value="">Seleccione un cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ (old('cliente_id') == $cliente->id) ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                    @error('cliente_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                @endif




                <div class="form-group">
                    <label for="persona_contacto">Persona de contacto:</label>
                    <input type="text" class="form-control @error('persona_contacto') is-invalid @enderror" id="persona_contacto" name="persona_contacto" value="{{ old('persona_contacto') }}">
                    @error('persona_contacto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>




                <div class="form-group">
                    <label for="telefono_contacto">Teléfono de contacto:</label>
                    <input type="tel" class="form-control @error('telefono_contacto') is-invalid @enderror" id="telefono_contacto" name="telefono_contacto" value="{{ old('telefono_contacto') }}">
                    @error('telefono_contacto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}">
                    @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" class="form-control @error('codigo_postal') is-invalid @enderror" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}">
                    @error('codigo_postal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="poblacion">Población:</label>
                    <input type="text" class="form-control @error('poblacion') is-invalid @enderror" id="poblacion" name="poblacion" value="{{ old('poblacion') }}">
                    @error('poblacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="provincia">Provincia:</label>
                    <input type="text" class="form-control @error('provincia') is-invalid @enderror" id="provincia" name="provincia" value="{{ old('provincia') }}">
                    @error('provincia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado">
                        <option value="P" {{ (old('estado') == 'P') ? 'selected' : '' }}>Pendiente</option>
                        <option value="R" {{ (old('estado') == 'R') ? 'selected' : '' }}>Realizada</option>
                        <option value="C" {{ (old('estado') == 'C') ? 'selected' : '' }}>Cancelada</option>
                    </select>
                    @error('estado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                @if (Auth::check())
                <div class="form-group">
                    <label for="operario">Operario:</label>
                    <select class="form-control @error('operario') is-invalid @enderror" id="operario" name="operario">
                        @foreach($operarios as $operario)
                        <option value="{{ $operario->id }}">{{ $operario->name }}</option>
                        @endforeach
                    </select>
                    @error('operario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endif




                <div class="form-group">
                    <label for="fecha_realizacion">Fecha Realización:</label>
                    <input type="date" class="form-control @error('fecha_realizacion') is-invalid @enderror" id="fecha_realizacion" name="fecha_realizacion" value="{{ old('fecha_realizacion') }}">
                    @error('fecha_realizacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="anotaciones_antes">Anotaciones Antes:</label>
                    <textarea class="form-control @error('anotaciones_antes') is-invalid @enderror" id="anotaciones_antes" name="anotaciones_antes" rows="3">{{ old('anotaciones_antes') }}</textarea>
                    @error('anotaciones_antes')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                @if (!Auth::check())
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">Rellene con sus datos:</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cif">CIF:</label>
                            <input type="text" class="form-control @error('cif') is-invalid @enderror" id="cif" name="cif" value="{{ old('cif') }}">
                            @error('cif')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- @error('cif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror -->

                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>
                </div>

                @endif



                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('tarea.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>

            </form>



            <!-- <div class="modal fade" id="verificarClienteModal" tabindex="-1" role="dialog" aria-labelledby="verificarClienteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verificarClienteModalLabel">Verificar cliente</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="verificarClienteForm">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="cif">CIF:</label>
                                    <input type="text" class="form-control" id="cif" name="cif">
                                </div>
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Verificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->


        </div>
    </div>
</div>


@endsection