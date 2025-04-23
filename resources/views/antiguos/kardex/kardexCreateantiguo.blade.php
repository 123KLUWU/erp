@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-auto col-lg-auto">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('kardex.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="producto_id" class="form-label">Producto</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('producto_id') is-invalid @enderror"
                            name="producto_id"
                            id="producto_id">
                            <option value="" selected>Seleccione un PRODUCTO</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" data-unidad="{{ $producto->clave }}" data-abreviacion="({{ $producto->codigo }})">
                                clave: {{ $producto->clave }} codigo: {{ $producto->codigo }} descripcion: {{ $producto->descripcion }}
                                </option>
                            @endforeach
                        </select>
                        @error('producto_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>    
                </div>

                <div class="mb-3">
                    <label for="tipo_movimiento" class="form-label">tipo de movimiento</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('tipo_movimiento') is-invalid @enderror"
                            name="tipo_movimiento"
                            id="tipo_movimiento">
                            <option value="" selected>Seleccione un movimiento</option>
                            <option value="entrada" selected>entrada</option>
                            <option value="salida" selected>salida</option>
                            <option value="ajuste" selected>ajuste</option>
                        </select>
                        @error('tipo_movimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="cantidad" class="form-label">
                        cantidad
                    </label>
                    <input
                        required
                        type="number"
                        value="1"
                        min="1"
                        class="form-control @error('cantidad') is-invalid @enderror"
                        name="cantidad"
                        id="cantidad"
                        aria-describedby="clavesmall"
                    />
                    @error('cantidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small id="clavesmall" class="form-text text-muted">
                        solo se admiten numeros de maximo 5 digitos
                    </small>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">fecha</label>
                    <input
                        required
                        type="datetime-local"
                        class="form-control @error('fecha') is-invalid @enderror"
                        name="fecha"
                        id="fecha"
                        aria-describedby="codigosmall"
                    />
                    @error('fecha')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="precio_unitario" class="form-label">precio_unitario</label>
                    <input
                        required
                        type="number"
                        step="0.01"
                        class="form-control @error('precio_unitario') is-invalid @enderror"
                        name="precio_unitario"
                        id="precio_unitario"
                        value="0.00"
                        aria-describedby="codigosmall"
                    />
                    @error('precio_unitario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small id="codigosmall" class="form-text text-muted"
                       >solo se admiten numeros de maximo 5 digitos</small
                      >
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3"></textarea>
                  @error('descripcion')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                            <button class="w-100 btn btn-primary btn-lg" type="submit" name="insertar">Registrar</button>
              </div>
            </form>
        </div>                 
    </div>
@endsection