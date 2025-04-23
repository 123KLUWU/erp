@extends('layouts.app') @section('content')
    <div class="table-responsive row py-4">
        <div class="col">
        <center><h2>Todos los movimientos</h2></center>
            <table class="table table-bordered table-striped table-hover">
                <thead>

                <th></th>
                <th>Producto</th>
                <th>Realizado por el usuario</th>
                <th>Tipo de movimiento</th>
                <th>Cantidad</th>
                <th>Fecha en que se realizo</th>
                <th>precio unitario del producto</th>
                <th>Descripcion del movimiento</th>

                </thead>

                <tbody id="content">

                @foreach ($movimientos as $producto)
                <tr>
                    <td><a href="{{ route('kardex.detalles', ['id' => $producto->id]) }}" class="btn btn-primary">Ver Detalles</a></td>
                    <td><a href="{{ route('kardex.producto', ['producto_id' => $producto->productoId->id]) }}" class="btn btn-primary">{{ $producto->productoId->descripcion ?? 'N/A'  }}</a></td>
                    <td>{{ $producto->userId->name ?? 'N/A' }}</td>
                    <td>{{ $producto->tipo_movimiento}}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->created_at }}</td>
                    <td>{{ $producto->precio_unitario }}</td>
                    <td>{{ $producto->descripcion ?? 'N/A' }}</td>
                </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection