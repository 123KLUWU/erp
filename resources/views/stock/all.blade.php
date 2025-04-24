@extends('layouts.app') @section('content')
    <div class="table-responsive row py-4">
        <div class="col">
        <center><h2>Todos los movimientos</h2></center>
            <table class="table table-bordered table-striped table-hover">
                <thead>

                <th>existencias</th>
                <th>ordenadas</th>
                <th>stock</th>
                <th>ultima_compra</th>
                <th>max</th>
                <th>min</th>

                </thead>

                <tbody id="content">

                @foreach ($stock as $existencias)
                <tr>
                    <td>{{ $existencias->existencias}}</td>
                    <td>{{ $existencias->ordenadas}}</td>
                    <td>{{ $existencias->stock }}</td>
                    <td>{{ $existencias->ultima_compra }}</td>
                    <td>{{ $existencias->max }}</td>
                    <td>{{ $existencias->min}}</td>
                </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection