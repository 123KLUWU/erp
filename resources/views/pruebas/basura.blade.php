<!-- este meta contiene el token csrf necesario para que funcione
    el script que controla los modales de agregar y editar
    este debe ir al inicio del script, en el head de la pagina
-->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- -->

    <!-- este codigo de aqui es para mostrar el nombre del usuario autenticado -->
        @auth
            Bienvenido, {{ Auth::user()->name }}
        @endauth
    <!-- -->

    <!-- 
    este de aqui muestra el contenido que esta extendiendo el layout 
    y tambien indica en donde se coloque se va a colocar ese contenido
     -->
    @yield('content')
    <!-- -->

    <!-- este codigo indica que se quiere extender el layout de la applicacion -->
    @extends('layouts.app') 
    <!-- -->

    <!-- esta seccion indica donde inicia el codigo que extiende el layout -->
    @section('content')
    <!-- -->

    <!-- y este indica donde acaba el codigo que extiende el layout -->
    @endsection
    <!-- -->

    <!-- 
        este es un ejemplo de como se deslogea un usuario
        se manda un formulario a la ruta de logout 
    -->
        <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                <a class="nav-link d-flex align-items-center gap-2" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <svg class="bi"><use xlink:href="#door-closed"/></svg>
                    Sign out
                </a>
        </li>
    <!-- -->
    
    <!--
     esta parte carga el codigo para controlar los modadel de agregar y editar
     se recomienda poner al final del body para que asi se carge despues de que se haya cargado todo el script
    -->
    <script src="{{ asset('js/modalcatalogo.js') }}"></script>
    <!-- -->

    <!-- este es un ejemplo vacio del boton para mandar a llamar la modal que agrega un nuevo registro-->
                <button
                    type="button"
                    class="btn btn-secondary agregar-opcion"
                    data-select-id=""
                    data-modal-title=""
                    data-ruta-agregar="{{ route('entidades.agregar', ['entidad' => '']) }}"
                    data-campos='[""]'
                    >
                    +
                </button>
    <!-- -->

    <!-- este es un ejemplo vacio del boton para mandar a llamar la modal que edita un registro -->
                <button
                    type="button"
                    class="btn btn-primary editar-opcion"
                    data-select-id=""
                    data-modal-title=""
                    data-ruta-editar="{{ route('entidades.editar', ['entidad' => '']) }}"
                    data-campos='[""]'
                    >
                    Editar
                </button>
                <!-- -->
                <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3" href="{{ route('register.view') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                </svg>
                    Registro de usuarios
                </a>
                </li>