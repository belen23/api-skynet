@extends('home')
@section('content')
    

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> CASOS </h4>
          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="restults">
              <thead class=" text-primary">
                                      
                <th>Caso </th>
                <th> Tipo de caso </th>
                
                <th> </th>
                
              </thead>
              <tbody>

              
               
                
              </tbody>
            </table>
          
            <script>
       fetch('http://localhost:8000/api/caso', {
        method: 'GET', 
        headers: { 'Authorization': 'Bearer <?php echo Auth()->user()->api_token;?>' }
        }).then(response => response.json())
        .then( res => {
            let datos = res.caso;
            let table = document.getElementById('restults');
            datos.forEach( dato => {
                table.innerHTML += `<td>${dato.caso}</td><td>${dato.tipo}</td>`;
            }) 
        })

        
        </script>
          </div>
        </div>
      </div>
    </div>
  </div>

  
@endsection

  