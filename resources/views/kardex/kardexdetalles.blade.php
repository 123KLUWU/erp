@extends('layouts.app') @section('content')
    <div class="table-responsive row py-4">
        <div class="col">
            <center><h2>Detalles de Movimiento</h2></center>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <th></th>
                    
                </thead>

                <tbody id="content">

                <tr>
                    <td>{{ $movimiento->productoId->descripcion ?? 'N/A'  }}</td>
                    <td>{{ $movimiento->tipo_movimiento}}</td>
                    <td>{{ $movimiento->cantidad }}</td>
                    <td>{{ $movimiento->created_at }}</td>
                    <td>{{ $movimiento->precio_unitario }}</td>
                    <td>{{ $movimiento->descripcion ?? 'N/A' }}</td>
                </tr>



                </tbody>
            </table>
        </div>
    </div>
@endsection