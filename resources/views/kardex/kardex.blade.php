@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-md-auto col-lg-auto">
            <center><h1>Kardex del Sistema</h1></center>
            <center><h1></h1></center>
    <center><a class="btn btn-primary" href="{{ route('kardex.all') }}">
        Movimientos
    </a>
    <a class="btn btn-primary" href="{{ route('kardex.create') }}">
        Registrar movimiento
    </a>
</center>
@endsection