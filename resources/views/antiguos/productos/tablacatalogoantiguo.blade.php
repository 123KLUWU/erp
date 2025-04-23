@extends('layouts.app') @section('content')
<div class="table-responsive row py-4">
    <div class="col">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <th></th>
                <th class="sort asc">Productos</th>

            </thead>

            <tbody id="content">

            @foreach ($productos as $producto)
            <tr>

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
@endsection