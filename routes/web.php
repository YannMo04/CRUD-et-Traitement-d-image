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
Route::get("/", [ProductController::class, "index"]);
//Pour ajouter un produit
Route::get("/ajouter", [ProductController::class,"create"]);
Route::post("/ajouter/traitement", [ProductController::class,"store"]);
//Pour modifier et mettte à jour
Route::get("/update/{id}", [ProductController::class,"edit"]);
Route::post("/update/traitement/{id}", [ProductController::class,"update"]);
//Pour supprimer
Route::delete("/delete/{id}", [ProductController::class,"destroy"]);


