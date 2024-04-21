@include('header')

<body>


    <div class="container text-center">
       
      <div class="row">

        <h1>AJOUTER PRODUIT</h1>
        <hr>
           
           @foreach($errors->all() as $error)
               
               <div class="alert alert-danger">
                 {{$error}}
              </div>
           @endforeach
       
            <div class="col s12">

              <form action="{{url("/update/traitement/{$produit->id}")}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" style = "display:none" value="{{$produit->id}}">
               <div class="form-group">
                  <label for="nom" class="form-label">Nom du produit</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom du produit" value="{{$produit->nom }}">
              </div>

              <div class="form-group">
                 <label for="prix" class="form-label">Prix</label>
                 <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrez le prix du produit" value="{{$produit->prix 
                }}">
             </div>

             <div class="form-group">
                 <label for="description" class="form-label">Description</label>
                 <input type="text" class="form-control" id="description" name="description" placeholder="Entrez sa description" value="{{$produit->description }}">
             </div>
              <label for="photo">Photo</label>
             <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*" value="{{$produit->photo }}">  
                      <label class="custom-file-label" for="photo"></label>
                  </div>
             </div>

             <br>

                <button type="submit" class= "btn btn-primary">AJOUTEZ</button>

             <br>

             <br>

             <a href="{{url("/")}}"class= "btn btn-danger">Revenir à la liste</a>

             </form>
         </div>   
     </div>
 </div>


    
</body>
</html>