@extends('layouts.acces')

@section('content')
<div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3><strong>Registrarse</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="{{ route('register.store') }}" method="post">
              @csrf
                <div class="form-group first">
                  <label for="name">Nombre</label>
                  <input type="name" class="form-control" placeholder="Ingresa tu nombre" id="name" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>
                <div class="form-group last mb-3">
                  <label for="email">Correo</label>
                  <input 
                    type="email" 
                    class="form-control" 
                    placeholder="Ingresa tu correo" 
                    id="email" 
                    name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Contraseña</label>
                  <input 
                    type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    placeholder="Ingresa tu contraseña" 
                    id="password" 
                    name="password"
                    required autocomplete="new-password">
                </div>
                                   @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                <div class="form-group last mb-3">
                  <label for="password">Confirmar Contraseña</label>
                  <input 
                    type="password-confirm" 
                    class="form-control" 
                    placeholder="Ingresa de nuevo tu contraseña" 
                    id="password-confirm" 
                    name="password-confirm" 
                    required autocomplete="new-password">
                </div>

                <div class="row mb-0">
                <div class="form-row-last">
                <center><input type="submit" value="Iniciar" class="btn btn-primary">
                <p>O<a href="{{ route('login.view') }}">Iniciar Sesión</a></p> </center>
                </div>
                </div>

              </form>
              
            </div>
          </div>
        </div>
      </div>
@endsection