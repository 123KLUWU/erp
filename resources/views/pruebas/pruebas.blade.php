@extends('layouts.app')

@section('content')
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

                <tr>{{ $producto->clave }}</tr>
                <tr>{{ $producto->codigo}}</tr>
                <tr>{{ $producto->descripcion }}</tr>
                <tr>{{ $producto->unidadCompra->unidad ?? 'N/A' }}</tr>
                <tr>{{ $producto->linea->linea ?? 'N/A' }}</tr>
                <tr>{{ $producto->marca->marca ?? 'N/A' }}</tr>
                <tr>{{ $producto->modelo->modelo ?? 'N/A' }}</tr>
                <tr>{{ $producto->talla->talla ?? 'N/A' }}</tr>
                <tr>{{ $producto->color->color ?? 'N/A' }}</tr>
                <tr>{{ $producto->departamento->departamento ?? 'N/A' }}</tr>
                <tr>{{ $producto->ubicacion->ubicacion ?? 'N/A' }}</tr>
                <tr>{{ $producto->grupo->grupo ?? 'N/A' }}</tr>
                <tr>{{ $producto->corte->corte ?? 'N/A' }}</tr>
                <tr>{{ $producto->nivel->nivel ?? 'N/A' }}</tr>

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
@endsection