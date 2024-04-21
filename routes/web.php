<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//afficher
Route::controller(productController::class)->group(function () {
      //afficher
      Route::get("/", "index");
      //Pour ajouter un produit
      Route::get("/ajouter", "create");
      Route::post("/ajouter/traitement", "store");
     //Pour modifier et mettte à jour
      Route::get("/update/{id}", "edit");
      Route::post("/update/traitement/{id}", "update");
      //Pour supprimer
      Route::get("/delete/{id}", "destroy");

      
    }
);

