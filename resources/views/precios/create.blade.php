blade
<form method="POST" action="{{ route('precios.store') }}">
    @csrf

    <div class="form-group">
        <label for="producto_id">Producto ID</label>
        <input type="text" class="form-control" id="producto_id" name="producto_id" required>
    </div>

    <div class="form-group">
        <label for="precio_venta">Precio de Venta</label>
        <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" required>
    </div>

    <div class="form-group">
        <label for="precio_compra">Precio de Compra</label>
        <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" required>
    </div>

    <!-- Aquí puedes añadir otros campos relevantes del modelo Precios -->

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>