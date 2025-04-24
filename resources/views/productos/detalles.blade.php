@extends('layouts.app') @section('content')
<div class="table-responsive row py-4">
    <div class="col">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <center><h1>Detalles del Producto</h1></center>
            <center><h3>Datos del Producto</h3></center>
            <div class="btn-group">
                    <form action="{{ route('catalogo.delete', $producto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                    <button class="btn btn-warning">
                        <a class="btn btn-link-dark" href="{{ route('catalogo.editar', $producto->id) }}">
                            Editar
                        </a>
                    </button>

                    </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
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



            </tbody>
        </table>
        <center><h3>Detalle de precio</h3></center>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>costo</th>
                    <th>descuento</th>
                    <th>ieps</th>
                    <th>iva</th>
                    <th>excento_de_iva</th> 
                    <th>costo_neto</th>
                    <th>utilidad</th>
                    <th>precio</th>
                </tr>
            </thead>

            <tbody id="content">

            <tr>
                <td>{{ $producto->precios->costo }}</td>
                <td>{{ $producto->precios->descuento }}%</td>
                <td>{{ $producto->precios->ieps }}%</td>
                <td>{{ $producto->precios->iva }}%</td>
                <td>
                    @if ($producto->precios->excento_de_iva == 1)
                        si
                    @else
                        no
                    @endif
                </td>
                <td>{{ $producto->precios->costo_neto }}</td>
                <td>{{ $producto->precios->utilidad }}%</td>
                <td>{{ $producto->precios->precio }}</td>

            </tr>



            </tbody>
        </table>
        <center><h3>Stock del Producto</h3></center>

        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>existencias</th>
                    <th>ordenadas</th>
                    <th>stock</th>
                    <th>ultima_compra</th>
                    <th>max</th> 
                    <th>min</th>
                </tr>
            </thead>

            <tbody id="content">

            <tr>
                <td>{{ $producto->stock->existencias }}</td>
                <td>{{ $producto->stock->ordenadas}}</td>
                <td>{{ $producto->stock->stock }}</td>
                <td>{{ $producto->stock->ultima_compra }}</td>
                <td>{{ $producto->stock->max }}</td>
                <td>{{ $producto->stock->min }}</td>
            </tr>



            </tbody>
        </table>
    </div>
</div>

@endsection