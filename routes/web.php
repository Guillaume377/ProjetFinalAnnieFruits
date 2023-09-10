<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GammeController;

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



Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//*********************** Routes d'affichage "user" **********************************/

Route::resource('/users' , \App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
Route::put('/user/updatepassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatepassword');



//*********************** Route d'affichage de la page home**********************************/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//***************** Route pour la gestion des favoris*****************************/

Route::resource('/favori', \App\Http\Controllers\FavoriController::class)->except('create', 'show', 'update', 'edit');

// Route::get('favori', [App\Http\Controllers\FavoriController::class, 'show'])->name('favori.show');
// // « favori.show » pour afficher les favoris

// Route::post('favori/add/{article}', [App\Http\Controllers\FavoriController::class, 'add'])->name('favori.add');
// // « favori.add » pour ajouter ou mettre à jour un produit en favori

// Route::get('favori/remove/{article}', [App\Http\Controllers\FavoriController::class, 'remove'])->name('favori.remove');
// //« favori.remove » pour retirer un produit des favoris



//***************** Route d'affichage de la page Nous contacter *****************************/

Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');



// **************** Les routes de gestion du panier **************** //

Route::get('panier', [App\Http\Controllers\PanierController::class, 'show'])->name('panier.show');
// « panier.show » pour afficher le panier

Route::post('panier/add/{article}', [App\Http\Controllers\PanierController::class, 'add'])->name('panier.add');
// « panier.add » pour ajouter ou mettre à jour un produit du panier

Route::get('panier/remove/{article}', [App\Http\Controllers\PanierController::class, 'remove'])->name('panier.remove');
//« panier.remove » pour retirer un produit du panier

Route::get('panier/empty', [App\Http\Controllers\PanierController::class, 'empty'])->name('panier.empty');
//« panier.empty » pour vider les produits du panier



// *************** Les routes de la page Validation Panier *********** //

Route::get('/validation', [App\Http\Controllers\PanierController::class, 'validation'])->name('validation')->middleware('auth');
// 'validation' pour afficher la page validation

Route::resource('/user', App\Http\Controllers\UserController::class)->except('index', 'create', 'store');
//valider les modifications d'informations personnelles

Route::get('/emptyAfterOrder', [App\Http\Controllers\PanierController::class, 'emptyAfterOrder'])->name('emptyAfterOrder');
// pour vider le panier après validation de la commande

Route::post('validation/reservation', [App\Http\Controllers\PanierController::class, 'reservation'])->name('reservation');
// 'reservation' pour enregistrer l'heure et le jour de retrait de la commande



// ******************* Les routes de la page Commandes **************** //

Route::resource('/commandes', App\Http\Controllers\CommandeController::class)->except('create', 'store', 'edit', 'update', 'destroy');

Route::get('/sauvegardeCommande', [App\Http\Controllers\CommandeController::class, 'store'])->name('commandes.store');
// 'store' pour sauvegarder la commande en BDD après validation de la commande



// ******************* Route ressources Articles **************** //

Route::resource('/articles', ArticleController::class);


// ******************* Route ressources Gammes **************** //

Route::resource('/gammes', GammeController::class);


// ****************************Route Avis ******************** //

Route::post('avis', [App\Http\Controllers\AvisController::class, 'store'])->name('avis.store');


// ******************* Route pour la gestion du back-office ************************************/

Route::get('/backoffice', [AdminController::class, 'index'])->name('backoffice');
