@extends('layouts.acces') @section('content')
<div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3><strong>Inicio de Sesión</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="{{ route('login.store') }}" method="post">
              @csrf
                              @if ($errors->any())
                                  <div class="alert alert-danger">
                                      Credenciales incorrectas.
                                  </div>
                              @endif
                <div class="form-group first">
                  <center><label for="email">Correo</label></center>
                  <input type="email" class="form-control" placeholder="Ingresa tu correo" id="email" name="email">
                </div>
                <div class="form-group last mb-3">
                  <center><label for="password">Contraseña</label></center>
                  <input 
                    type="password" 
                    class="form-control" 
                    placeholder="Ingresa tu contraseña" 
                    id="password" 
                    name="password">
                </div>
                

                            <div class="row mb-0">
                                <div class="col-md-6">
                                    <center><button type="submit" value= "Iniciar" class="btn btn-primary">
                                        Iniciar
                                    </button></center
                                </div>
                            </div>

                            <div class="row mb-0">
                             <div class="col-md-3">
                             <a class="btn btn-link" href="{{ route('register.view') }}">
                               Registrate
                               </div>
                               </div>

              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
