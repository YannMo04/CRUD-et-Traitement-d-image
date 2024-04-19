@include('header')

<body>


    <div class="container text-center">
       
      <div class="row">

        <h1>AJOUTER PRODUIT</h1>
        <hr>
           

           @if(session("success"))

              <div class="alert alert-success">
                 {{session("success")}}
              </div>

           @endif
           @foreach($errors->all() as $error)
               
               <div class="alert alert-danger">
                 {{$error}}
              </div>

           @endforeach
       
            <div class="col s12">

              <form action="/ajouter/traitement" method="post" enctype="multipart/form-data">
                @csrf

               <div class="form-group">
                  <label for="nom" class="form-label">Nom du produit</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom du produit">
              </div>

              <div class="form-group">
                 <label for="prix" class="form-label">Prix</label>
                 <input type="number" class="form-control" id="prix" name="prix" placeholder="Entrez le prix du produit">
             </div>

             <div class="form-group">
                 <label for="description" class="form-label">Description</label>
                 <input type="text" class="form-control" id="description" name="description" placeholder="Entrez sa description">
             </div>
              <label for="photo">Photo</label>
             <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/*">  
                      <label class="custom-file-label" for="photo"></label>
                  </div>
             </div>

             <br>

                <button type="submit" class= "btn btn-primary">AJOUTEZ</button>

             <br>

             <br>

             <a href="/"class= "btn btn-danger">Revenir à la liste</a>

             </form>
         </div>   
     </div>
 </div>


    
</body>
</html>