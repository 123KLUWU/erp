<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/sofi/sty.css') }}">

    <link rel="stylesheet" href="{{ asset ('css/sofi/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/sofi/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset ('css/sofi/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('sofia/ico.png') }}"/>

    <title>Inicio de Sesión</title>
  </head>
  <body>
  

    <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{ asset('sofia/ini.png') }}')"></div>
        
    <div class="contents order-2 order-md-1">
          @yield('content')
          </div>
        </div>
    </div>
      
    <script src="{{ asset ('js/sofi/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset ('js/sofi/popper.min.js') }}"></script>
    <script src="{{ asset ('js/sofi/bo.js') }}"></script>
    <script src="{{ asset ('js/sofi/main.js')}}"></script>
  </body>
</html>