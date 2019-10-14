@extends('layouts.app')

@section('content')
<div class="col-md-8">
                <div class="card card-user">
                  <div class="card-header">
                    <h5 class="card-title">Ingreso de Usuario</h5>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{route('registrausuario')}}">
                        {!! csrf_field() !!}
                     
                      <div class="row">
                          <div class="col-md-6 pl-1">
                            <div class="form-group">
                              <label >Dpi</label>
                              <input type="text" name="dpi" value="{{old('dpi')}}" class="form-control" placeholder="Guatemala">
                            </div>
                          </div>
                          <div class="col-md-6 pl-1">
                            <div class="form-group">
                              <label >Nombre</label>
                              <input type="text" name="nombre" value="{{old('apellido')}}" class="form-control" placeholder="Guatemala">
                            </div>
                          </div>
                          <div class="col-md-6 pl-1">
                            <div class="form-group">
                              <label >Apellido</label>
                              <input type="text" name="apellido" value="{{old('apellido')}}" class="form-control" placeholder="Guatemala">
                            </div>
                          </div>
                          <div class="col-md-6 pl-1">
                            <div class="form-group">
                              <label >Fecha de nacimiento</label>
                              <input type="date" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" placeholder="Guatemala">
                            </div>
                          </div>
                            <div class="col-md-6 pl-1">
                            <div class="form-group">
                              <label >Correo</label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Guatemala">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6 pl-1">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6 pl-1">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                            
                          </div>
                        </div>
                          
                     
                      <div class="row">
                        <div class="update ml-auto mr-auto">
                          <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
@endsection
