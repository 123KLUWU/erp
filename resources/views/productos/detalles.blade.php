@extends('layouts.app') @section('content')
<div class="table-responsive row py-4">
    <div class="col">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <center><h2>Listado de Productos</h2></center>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>

                    <th>Acciones</th> 
                    <th></th> 
                    <th>Clave</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Unidad de Compra</th>
                    <th>Línea</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Departamento</th>
                    <th>Ubicación</th>
                    <th>Grupo</th>
                    <th>Corte</th>
                    <th>Nivel</th>
                </tr>
            </thead>

            <tbody id="content">

            @foreach ($productos as $producto)
            <tr>
                <td>                    
                    <div class="btn-group">
                    <form action="{{ route('catalogo.delete', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
                <td>
                    <button class="btn btn-warning">
                        <a class="btn btn-link-dark" href="{{ route('catalogo.editar', $producto->id) }}">
                            Editar
                        </a>
                    </button>
                    <button class="btn btn-warning">
                        <a class="btn btn-link-dark" href="{{ route('productos.detalles', $producto->id) }}">
                            ver detalles
                        </a>
                    </button>
                    </div>
                </td>
                <td>{{ $producto->clave }}</td>
                <td>{{ $producto->codigo}}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->unidadCompra->unidad ?? 'N/A' }}</td>
                <td>{{ $producto->linea->linea ?? 'N/A' }}</td>
                <td>{{ $producto->marca->marca ?? 'N/A' }}</td>
                <td>{{ $producto->modelo->modelo ?? 'N/A' }}</td>
                <td>{{ $producto->talla->talla ?? 'N/A' }}</td>
                <td>{{ $producto->color->color ?? 'N/A' }}</td>
                <td>{{ $producto->departamento->departamento ?? 'N/A' }}</td>
                <td>{{ $producto->ubicacion->ubicacion ?? 'N/A' }}</td>
                <td>{{ $producto->grupo->grupo ?? 'N/A' }}</td>
                <td>{{ $producto->corte->corte ?? 'N/A' }}</td>
                <td>{{ $producto->nivel->nivel ?? 'N/A' }}</td>
            </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="modalPrecio" tabindex="-1" aria-labelledby="modalPrecioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPrecioLabel">Editar Precios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarPrecio">
                    @csrf
                    @method('PUT') {{-- O PATCH --}}
                    <input type="hidden" name="producto_id" id="producto_id_precio">
                    <div class="mb-3">
                        <label for="costo_modal" class="form-label">Costo</label>
                        <input type="number" step="0.01" class="form-control" id="costo_modal" name="costo">
                    </div>
                    <div class="mb-3">
                        <label for="descuento_modal" class="form-label">Descuento (%)</label>
                        <input type="number" step="0.01" class="form-control" id="descuento_modal" name="descuento">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Precios</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection