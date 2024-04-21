@include('header');

<body>
    

 <div class="container text-center">
    <div class="row">

      <div class="col s12">
        <h1>CRUD en LARAVEL</h1>

        @if(session('destroy'))
           <div class="alert alert-success">{{session('destroy')}}</div>
         @endif

        @if(session('success'))
          <div class="alert alert-success">{{session('success')}}</div>
        @endif
      
        
        <hr>
            
        <a href="{{url("/ajouter")}}" class="btn btn-primary">Ajouter un produit</a>
    
        <hr>
          <table class="table bordered">
            <thead>
              <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom du produit</th>
                    <th scope="col" width="150px">Prix</th>
                    <th scope="col" width="350px">Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col" width="150px">Action</th>
              </tr>
            </thead>
            <tbody>
                  
                    @php

                    $ide = 1;

                    @endphp
                    @foreach($produits->sortBy("id") as $produit)
                  <tr>
                    
                    <th scope="row">{{$ide}}</th>
                    <td>{{$produit->nom}}</td>
                    <td>{{$produit->prix}} Frcs</td>
                    <td>{{$produit->description}}</td>
                    <td><img src="{{asset('storage/'.$produit->photo)}}" alt="Photo" width="100px;"height="100px;"></td>
                    <td>
                      <a href="{{url("/update/{$produit->id}")}}" class="btn btn-warning">Edit</a>
                      <form action="{{url("/delete/{$produit->id}")}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    </td>
                    @php
                      $ide += 1;
                    @endphp
                    @endforeach
                  </tr>
            </tbody>
          </table>
        </div>
       
    </div>
 </div>


  <script>
                // Sélectionnez l'élément de l'alerte
                var alertElement = document.getElementById('alert');

                // Définir le délai d'apparition en millisecondes (par exemple, 3000 pour 3 secondes)
                 var delay = 3000;

                // Fonction pour masquer l'alerte après le délai spécifié
                setTimeout(function(){
                alertElement.style.display = 'none';
                }, delay);
  </script>
</body>
</html>