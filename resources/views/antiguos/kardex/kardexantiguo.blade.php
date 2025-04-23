@extends('layouts.app')
@section('content')
    <a class="btn btn-link" href="{{ route('kardex.all') }}">
        Movimientos
    </a>
    <a class="btn btn-link" href="{{ route('kardex.create') }}">
        Registrar movimiento
    </a>
@endsection