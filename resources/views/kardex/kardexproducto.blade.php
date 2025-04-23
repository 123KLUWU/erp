@extends('layouts.app') @section('content')
    <div class="table-responsive row py-4">
        <div class="col">
        <center><h2>Listado de Movimientos por producto</h2></center>
            <table class="table table-bordered table-striped table-hover">
                <thead>
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
                    <td>{{ $producto->productoId->descripcion ?? 'N/A'  }}</td>
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