@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-auto col-lg-auto">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <center><h1>Movimientos</h1></center>
            <form action="{{ route('kardex.store') }}" method="post" class="row g-3">
                @csrf

                <div class="col-md-6">
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

                <div class="col-md-6">
                    <label for="tipo_movimiento" class="form-label">Tipo de Movimiento</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('tipo_movimiento') is-invalid @enderror"
                            name="tipo_movimiento"
                            id="tipo_movimiento">
                            <option value="" selected>Seleccione un movimiento</option>
                            <option value="entrada" selected>Entrada</option>
                            <option value="salida" selected>Salida</option>
                            <option value="ajuste" selected>Ajuste</option>
                        </select>
                        @error('tipo_movimiento')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-md-4">
                    <label for="cantidad" class="form-label">
                        Cantidad
                    </label>
                    <input
                        required
                        type="number"
                        value="1"
                        class="form-control @error('cantidad') is-invalid @enderror"
                        name="cantidad"
                        id="cantidad"
                        aria-describedby="clavesmall"
                    />
                    @error('cantidad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small id="clavesmall" class="form-text text-muted">
                        Solo se admiten números de máximo 5 digitos
                    </small>
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="col-md-4">
                    <label for="precio_unitario" class="form-label">Precio_Unitario</label>
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
                       >Solo se admiten números de máximo 5 digitos</small
                      >
                </div>

                <div class="col-md-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3"></textarea>
                  @error('descripcion')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                            <button class="btn btn-primary" type="submit" name="insertar">Registrar</button>
                </div>
              </div>
            </form>
        </div>                 
    </div>
@endsection