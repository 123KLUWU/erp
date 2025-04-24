@extends('layouts.app') @section('content')
    <div class="container">
        <div class="col-md-auto col-lg-auto">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <center><h2>Formulario de Productos</h2></center>
            <form action="{{ route('catalogo.store') }}" method="post" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="clave" class="form-label">Clave</label>
                    <input
                        required
                        type="text"
                        class="form-control @error('clave') is-invalid @enderror"
                        name="clave"
                        id="clave"
                        placeholder=""
                        maxlength="5"
                        minlength="5"
                        aria-describedby="clavesmall"
                    />
                    @error('clave')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small id="clavesmall" class="form-text text-muted">
                        Solo se admiten números de 5 digitos
                    </small>
                </div>

                <div class="col-md-6">
                    <label for="codigo" class="form-label">Código</label>
                    <input
                        required
                        type="text"
                        class="form-control @error('codigo') is-invalid @enderror"
                        name="codigo"
                        id="codigo"
                        placeholder=""
                        maxlength="5"
                        minlength="5"
                        aria-describedby="codigosmall"
                    />
                    @error('codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small id="codigosmall" class="form-text text-muted"
                       >Solo se admiten números de 5 digitos</small
                      >
                </div>

                <div class="col-md-6">
                    <label for="unidad_de_compra_id" class="form-label">Unidad de compra</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('unidad_de_compra_id') is-invalid @enderror"
                            name="unidad_de_compra_id"
                            id="unidad_de_compra_id">
                            <option value="" class="form-text text-muted" selected>Seleccione una unidad de compra</option>
                            @foreach($unidadesdecompra as $unidad)
                                <option value="{{ $unidad->id }}" data-unidad="{{ $unidad->unidad }}" data-abreviacion="({{ $unidad->abreviacion }})">
                                    {{ $unidad->unidad }} ({{ $unidad->abreviacion }})
                                </option>
                            @endforeach
                        </select>
                        @error('unidad_de_compra_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="unidad_de_compra_id"
                            data-modal-title="unidad de compra"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'unidadcompra']) }}"
                            data-campos='["unidad", "abreviacion"]'>
                            +
                        </button>

                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="unidad_de_compra_id"
                            data-modal-title="unidad de compra"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'unidadcompra']) }}"
                            data-campos='["unidad", "abreviacion"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="linea_id" class="form-label">Línea</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('linea_id') is-invalid @enderror"
                            name="linea_id"
                            id="linea_id">
                            <option value="">Seleccione una línea</option>
                            @foreach($lineas as $linea)
                                <option value="{{ $linea->id }}">
                                    {{ $linea->linea }}
                                </option>
                            @endforeach
                        </select>
                        @error('linea_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="linea_id"
                            data-modal-title="linea"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'linea']) }}"
                            data-campos='["linea"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="linea_id"
                            data-modal-title="linea"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'linea']) }}"
                            data-campos='["linea"]'>
                            Editar
                        </button>
                    </div>
                </div>


                <div class="col-md-6">
                    <label for="marca_id" class="form-label">Marca</label>
                    <div class="input-group">
                    <select
                        class="form-select form-select-lg @error('marca_id') is-invalid @enderror"
                        name="marca_id"
                        id="marca_id">
                        <option value="">Seleccione una marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{ $marca->id }}">
                                    {{ $marca->marca }}
                                </option>
                            @endforeach
                    </select>
                    @error('marca_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="marca_id"
                            data-modal-title="marca"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'marca']) }}"
                            data-campos='["marca"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="marca_id"
                            data-modal-title="marca"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'marca']) }}"
                            data-campos='["marca"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="modelo_id" class="form-label">Modelo</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('modelo_id') is-invalid @enderror"
                            name="modelo_id"
                            id="modelo_id">
                            <option value="">Seleccione un modelo</option>
                            @foreach($modelos as $modelo)
                                <option value="{{ $modelo->id }}">
                                    {{ $modelo->modelo }}
                                </option>
                            @endforeach
                        </select>
                        @error('modelo_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                                type="button"
                                class="btn btn-secondary agregar-opcion"
                                data-select-id="modelo_id"
                                data-modal-title="modelo"
                                data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'modelo']) }}"
                                data-campos='["modelo"]'>
                                +
                        </button>
                        <button
                                type="button"
                                class="btn btn-primary editar-opcion"
                                data-select-id="modelo_id"
                                data-modal-title="modelo"
                                data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'modelo']) }}"
                                data-campos='["modelo"]'>
                                Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="talla_id" class="form-label">Talla</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('talla_id') is-invalid @enderror"
                            name="talla_id"
                            id="talla_id">
                            <option value="">Seleccione una talla</option>
                            @foreach($tallas as $talla)
                                <option value="{{ $talla->id }}">
                                    {{ $talla->talla }}
                                </option>
                            @endforeach
                        </select>
                        @error('talla_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                                type="button"
                                class="btn btn-secondary agregar-opcion"
                                data-select-id="talla_id"
                                data-modal-title="talla"
                                data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'talla']) }}"
                                data-campos='["talla"]'>
                                +
                        </button>
                        <button
                                type="button"
                                class="btn btn-primary editar-opcion"
                                data-select-id="talla_id"
                                data-modal-title="talla"
                                data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'talla']) }}"
                                data-campos='["talla"]'>
                                Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="color_id">Color</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('color_id') is-invalid @enderror"
                            name="color_id"
                            id="color_id">
                            <option value="">Seleccione un color</option>
                            @foreach($colores as $color)
                                <option value="{{ $color->id }}">
                                    {{ $color->color }}
                                </option>
                            @endforeach
                        </select>
                        @error('color_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="color_id"
                            data-modal-title="color"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'color']) }}"
                            data-campos='["color"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="color_id"
                            data-modal-title="color"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'color']) }}"
                            data-campos='["color"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="departamento_id" class="form-label">Departamento</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('departamento_id') is-invalid @enderror"
                            name="departamento_id"
                            id="departamento_id">
                            <option value="">Seleccione un departamento</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">
                                    {{ $departamento->departamento }}
                                </option>
                            @endforeach
                        </select>
                        @error('departamento_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="departamento_id"
                            data-modal-title="departamento"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'departamento']) }}"
                            data-campos='["departamento"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="departamento_id"
                            data-modal-title="departamento"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'departamento']) }}"
                            data-campos='["departamento"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="ubicacion_id" class="form-label">Ubicación</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('ubicacion_id') is-invalid @enderror"
                            name="ubicacion_id"
                            id="ubicacion_id">
                            <option value="">Seleccione una ubicación</option>
                            @foreach($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id }}">
                                    {{ $ubicacion->ubicacion }}
                                </option>
                            @endforeach
                        </select>
                        @error('ubicacion_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="ubicacion_id"
                            data-modal-title="ubicacion"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'ubicacion']) }}"
                            data-campos='["ubicacion"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="ubicacion_id"
                            data-modal-title="ubicacion"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'ubicacion']) }}"
                            data-campos='["ubicacion"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="grupo_id" class="form-label">Grupo</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('grupo_id') is-invalid @enderror"
                            name="grupo_id"
                            id="grupo_id">
                            <option value="">Seleccione un grupo</option>
                            @foreach($grupos as $grupo)
                                <option value="{{ $grupo->id }}">
                                    {{ $grupo->grupo }}
                                </option>
                            @endforeach
                        </select>
                        @error('grupo_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="grupo_id"
                            data-modal-title="grupo"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'grupo']) }}"
                            data-campos='["grupo"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="grupo_id"
                            data-modal-title="grupo"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'grupo']) }}"
                            data-campos='["grupo"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="corte_id" class="form-label">Corte</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('corte_id') is-invalid @enderror"
                            name="corte_id"
                            id="corte_id">
                            <option value="">Seleccione un corte</option>
                            @foreach($cortes as $corte)
                                <option value="{{ $corte->id }}">
                                    {{ $corte->corte }}
                                </option>
                            @endforeach
                        </select>
                        @error('corte_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="corte_id"
                            data-modal-title="corte"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'corte']) }}"
                            data-campos='["corte"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="corte_id"
                            data-modal-title="corte"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'corte']) }}"
                            data-campos='["corte"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="nivel_id" class="form-label">Nivel</label>
                    <div class="input-group">
                        <select
                            class="form-select form-select-lg @error('nivel_id') is-invalid @enderror"
                            name="nivel_id"
                            id="nivel_id">
                            <option value="">Seleccione un nivel</option>
                            @foreach($niveles as $nivel)
                                <option value="{{ $nivel->id }}">
                                    {{ $nivel->nivel }}
                                </option>
                            @endforeach
                        </select>
                        @error('nivel_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button
                            type="button"
                            class="btn btn-secondary agregar-opcion"
                            data-select-id="nivel_id"
                            data-modal-title="nivel"
                            data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => 'nivel']) }}"
                            data-campos='["nivel"]'>
                            +
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary editar-opcion"
                            data-select-id="nivel_id"
                            data-modal-title="nivel"
                            data-ruta-editar="{{ route('entidades.editar', ['entidad' => 'nivel']) }}"
                            data-campos='["nivel"]'>
                            Editar
                        </button>
                    </div>
                </div>

                <div class="col-md-12">
                  <label for="descripcion" class="form-label">Descripción</label>
                  <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3"></textarea>
                  @error('descripcion')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="card mb-3">

                    <div class="card-header">
                        Precios
                        <button type="button" class="btn btn-sm btn-outline-secondary float-end" id="togglePrecios">Mostrar/Ocultar</button>
                    </div>
                    <div class="card-body" id="bodyPrecios">
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" step="0.01" class="form-control" id="costo" name="costo"
                                placeholder="0.00">
                        </div>
                        <div class="mb-3">
                            <label for="descuento" class="form-label">Descuento (%)</label>
                            <input type="number" step="0.01" class="form-control" id="descuento" name="descuento"
                                value="0" placeholder="0.00">
                        </div>
                        <div class="mb-3">
                            <label for="ieps" class="form-label">IEPS (%)</label>
                            <input type="number" step="0.01" class="form-control" id="ieps" name="ieps"
                                value="0" placeholder="0.00">
                        </div>
                        <div class="mb-3">
                            <label for="iva" class="form-label">IVA (%)</label>
                            <input type="number" step="0.01" class="form-control" id="iva" name="iva"
                                value="16" placeholder="0.00">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exento_de_iva"
                                name="excento_de_iva" value="1">
                            <label class="form-check-label" for="exento_de_iva">Exento de IVA</label>
                        </div>
                        <div class="mb-3">
                            <label for="costo_neto" class="form-label">Costo Neto</label>
                            <input type="number" step="0.01" class="form-control" id="costo_neto" name="costo_neto"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label for="utilidad" class="form-label">Utilidad (%)</label>
                            <input type="number" step="0.01" class="form-control" id="utilidad" name="utilidad"
                                value="30" placeholder="0.00">
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio"
                                readonly>
                        </div>
                    </div>
                    </div>

                    <div class="card mb-3">
                    <div class="card-header">
                        Stock
                        <button type="button" class="btn btn-sm btn-outline-secondary float-end" id="toggleStock">Mostrar/Ocultar</button>
                    </div>
                    <div class="card-body" id="bodyStock">
                        <div class="mb-3">
                            <label for="existencias" class="form-label">Existencias</label>
                            <input type="number" class="form-control" id="existencias" name="existencias" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="ordenadas" class="form-label">Ordenadas</label>
                            <input type="number" class="form-control" id="ordenadas" name="ordenadas" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="ultima_compra" class="form-label">Última Compra</label>
                            <input type="date" class="form-control" id="ultima_compra" name="ultima_compra">
                        </div>
                        <div class="mb-3">
                            <label for="max" class="form-label">Máximo</label>
                            <input type="number" class="form-control" id="max" name="max" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="min" class="form-label">Mínimo</label>
                            <input type="number" class="form-control" id="min" name="min" value="0">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                            <button class="btn btn-primary" type="submit" name="insertar">Registrar</button>
                </div>
              </div>

            </form>
        </div>                 
      </div>

      <!-- Modal para agregar -->
        <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarTitulo" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAgregarTitulo">Agregar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAgregar">
                            <div id="modalAgregarCampos"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="guardarAgregar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal para editar -->
        <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarTitulo" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarTitulo">Editar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEditar">
                            <input type="hidden" id="opcionIdEditar">
                            <div id="modalEditarCampos"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="guardarEditar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const preciosCardBody = document.getElementById('bodyPrecios');
                const stockCardBody = document.getElementById('bodyStock');
                const togglePreciosButton = document.getElementById('togglePrecios');
                const toggleStockButton = document.getElementById('toggleStock');

                // Inicialmente ocultar los cuerpos de las tarjetas
                preciosCardBody.style.display = 'none';
                stockCardBody.style.display = 'none';

                // Evento para mostrar/ocultar la sección de Precios
                togglePreciosButton.addEventListener('click', function () {
                    preciosCardBody.style.display = preciosCardBody.style.display === 'none' ? 'block' : 'none';
                });

                // Evento para mostrar/ocultar la sección de Stock
                toggleStockButton.addEventListener('click', function () {
                    stockCardBody.style.display = stockCardBody.style.display === 'none' ? 'block' : 'none';
                });
            });
        </script>
        <script>
            const costoInput = document.getElementById('costo');
            const descuentoInput = document.getElementById('descuento');
            const iepsInput = document.getElementById('ieps');
            const ivaInput = document.getElementById('iva');
            const exentoIvaCheckbox = document.getElementById('exento_de_iva');
            const costoNetoInput = document.getElementById('costo_neto');
            const utilidadInput = document.getElementById('utilidad');
            const precioInput = document.getElementById('precio');

            function calcularPrecios() {
                let costo = parseFloat(costoInput.value) || 0;
                let descuento = parseFloat(descuentoInput.value) || 0;
                let ieps = parseFloat(iepsInput.value) || 0;
                let iva = parseFloat(ivaInput.value) || 0;
                let utilidad = parseFloat(utilidadInput.value) || 0;
                let costoConDescuento = costo - (costo * (descuento / 100));
                let costoConIeps = costoConDescuento + (costoConDescuento * (ieps / 100));
                let costoNeto = costoConIeps;

                if (!exentoIvaCheckbox.checked) {
                    costoNeto += costoConIeps * (iva / 100);
                }

                costoNetoInput.value = costoNeto.toFixed(2);
                let precio = costoNeto + (costoNeto * (utilidad / 100));
                precioInput.value = precio.toFixed(2);
            }

            costoInput.addEventListener('input', calcularPrecios);
            descuentoInput.addEventListener('input', calcularPrecios);
            iepsInput.addEventListener('input', calcularPrecios);
            ivaInput.addEventListener('input', calcularPrecios);
            exentoIvaCheckbox.addEventListener('change', calcularPrecios);
            utilidadInput.addEventListener('input', calcularPrecios);

            calcularPrecios(); // Calcula al cargar la página
        </script>
@endsection
