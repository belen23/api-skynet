@extends('admin.layout')
@section('content')
          <div class="col-md-8">
                <div class="card card-user">
                  <div class="card-header">
                    <h5 class="card-title">Modicar Producto</h5>
                  </div>
                  <div class="card-body">
                  
                    <form method="POST" action="{{route('admin.productos.update',[$productos->idproductos],false)}}">
                      <input name="_method" type="hidden" value="PUT"> 
                      {!! csrf_field() !!}
                      <div class="row">
                        <div class="col-md-6 px-1">
                          <div class="form-group">
                            <label>Producto</label>
                            <input type="text" name="producto" value="{{old('producto',$productos->producto)}}" class="form-control">
                          </div>
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="col-md-6 pr-1">
                          <div class="form-group">
                            <label>Precio</label>
                            <input type="text" name="precio" value="{{old('precio', $productos->precio)}}"class="form-control">
                          </div>
                        </div>
                        
                       
                      </div>
                      
                      <div class="row">
                        <div class="col-md-4 pr-1">
                          
                        </div>
                                               
                      </div>
                      <div class="row">
                      
                       
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