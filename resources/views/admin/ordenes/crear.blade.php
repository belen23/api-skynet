@extends('home')
@section('content')

<div class="col-md-8">
  <div class="card card-user">
    <div class="card-header">
      <h5 class="card-title">Insertar caso</h5>
    </div>
    <div class="card-body">
        <form method="POST" action='http://localhost:8000/api/caso' >                 
          {!! csrf_field() !!}
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Caso</label>
              <input type="text" class="form-control" value="{{old('nombre','')}}" name="nombre">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tipo de caso</label>
              <input type="text" class="form-control" value="{{old('tipocaso_id','')}}" name="tipocaso_id">
            </div>
          </div>          
        </div>
       
        <div class="row">
          <div class="update ml-auto mr-auto">
            <button type="submit" class="btn btn-primary btn-round">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
   
 </div>

@endsection