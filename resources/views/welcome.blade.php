@extends('layouts.acces') @section('content')
<div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3><strong>¡Bienvenido a Nuestro Sistema ERP!</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
                <center><a href="{{ route('login.view') }}" class="btn btn-block btn-primary">Iniciar Sesión</a></center>
            </div>
          </div>
        </div>
      </div>
@endsection