@extends('layouts.app') @section('content')
    <div class="table-responsive row py-4">
        <div class="col">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <th></th>
                    <th class="sort asc">Todos los movimientos</th>

                </thead>

                <tbody id="content">
                @foreach ($movimientos as $producto)
                <tr>
                    <td>{{ $producto->productoId->descripcion ?? 'N/A'  }}</td>
                    <td>{{ $producto->tipo_movimiento}}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->fecha }}</td>
                    <td>{{ $producto->precio_unitario }}</td>
                    <td>{{ $producto->descripcion ?? 'N/A' }}</td>
                </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection