<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Afficher la première vue d'affichage
        //Requête pour selectionner tous les produits de la base de données
        $produits = Produit::all();
        return view("Produit.liste_produit", compact("produits"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Redirige vers la page d'ajout du produit
    
        return view("Produit.ajouter_produit");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // D'abord faire la requête de validation des champs

        $request->validate([
            "nom" => "required",
            "prix" => "required",
            "description" => "required",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        // instancier la class Produit 
        $produit = new Produit();
        //atttribution des valeurs de champ aux differents attributs de la classe Produit
        $produit->nom= $request->nom;
        $produit->prix= $request->prix;
        $produit->description= $request->description;

        if ($request->hasFile("photo")) {
            $file = $request->file("photo");
            $filename = time() .".". $file->getClientOriginalExtension(); // récupérer l'extension
            $file->move(public_path('storage'), $filename);
            $produit->photo = $filename;
        }else{
            $produit->photo = "ça ne passe pas";
        }
        $produit->save();

        return redirect('/ajouter')->with("success","Le produit a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // //Prendre l'etudiant qui a cet id
        $produit = Produit::find($id);
        return view("Produit.update_produit", compact("produit"));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //Modifier les produits

       //Regle de validation

        $request->validate([
            "nom" => "required",
            "prix" => "required",
            "description" => "required",
            "photo" => "required|image|mimes:jpeg,png,jpg,gif|max:2048",

        ]);

        //
        $produit = Produit::find($id);
        $produit->nom = $request->nom;
        $produit->prix = $request->prix;
        $produit->description = $request->description;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage'), $filename);
            $produit->photo = $filename;
        }else{
            $produit->photo = 'Ne passe pas';
        }
        $produit->update();

        return redirect("/")->with("success","Modification reussie");
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);
        $produit->delete();
        return redirect("/")->with("destroy","Le produit a bien été supprimé");
    }
}
