<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/weekly', 'HomeController@weekly')->name('weekly');
Route::get('/home/structureCharge', 'HomeController@structureCharge')->name('structureCharge');
Route::get('/home/chiffreCharge', 'HomeController@chiffreCharge')->name('chiffreCharge');
Route::get('/home/chiffreRecette', 'HomeController@chiffreRecette')->name('chiffreRecette');
Route::get('/home/quantiteCharge', 'HomeController@quantiteCharge')->name('quantiteCharge');
Route::get('/home/quantiteRecette', 'HomeController@quantiteRecette')->name('quantiteRecette');
Route::get('/home/prixCharge', 'HomeController@prixCharge')->name('prixCharge');
Route::get('/home/prixRecette', 'HomeController@prixRecette')->name('prixRecette');
Route::get('/home/filterCharge', 'HomeController@filterCharge')->name('filterCharge');
Route::get('/home/filterRecette', 'HomeController@filterRecette')->name('filterRecette');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/{user}/update', 'ProfileController@update')->name('updateProfile');

Route::get('/charges/add', 'ChargeController@add')->name('addCharge');
Route::get('/charges/{charge}/delete', 'ChargeController@delete')->name('deleteCharge');
Route::get('/charges', 'ChargeController@show')->name('charges');
Route::get('/charges/{charge}/edit', 'ChargeController@edit')->name('editCharge');
Route::post('/charges/{charge}/update', 'ChargeController@update')->name('updateCharge');
Route::post('/charges/add/store', 'ChargeController@store')->name('storeCharge');

Route::get('/recettes/add', 'RecetteController@add')->name('addRecette');
Route::get('/recettes/{recette}/delete', 'RecetteController@delete')->name('deleteRecette');
Route::get('/recettes', 'RecetteController@show')->name('recettes');
Route::get('/recettes/{recette}/edit', 'RecetteController@edit')->name('editRecette');
Route::post('/recettes/{recette}/update', 'RecetteController@update')->name('updateRecette');
Route::post('/recettes/add/store', 'RecetteController@store')->name('storeRecette');

Route::get('/produits/add', 'ProduitController@add')->name('addProduit');
Route::post('/produits/add/{client}/addRecette', 'ProduitController@addRecette')->name('addProduitRecette');
Route::post('/produits/add/{fournisseur}/addCharge', 'ProduitController@addCharge')->name('addProduitCharge');

Route::get('/programmer', 'ProduitController@show')->name('programmer');
Route::get('/produit/{produit}/delete', 'ProduitController@delete')->name('deleteProduit');
Route::get('/produit/{produit}/edit', 'ProduitController@edit')->name('editProduit');
Route::post('/produit/{produit}/update', 'ProduitController@update')->name('updateProduit');

Route::get('/client/new', 'ClientController@index')->name('newClient');
Route::post('/produits/add/addClient', 'ClientController@add')->name('addClient');
Route::get('/client/{client}/delete', 'ClientController@delete')->name('deleteClient');
Route::get('/client/{client}/edit', 'ClientController@edit')->name('editClient');
Route::post('/client/{client}/update', 'ClientController@update')->name('updateClient');

Route::get('/fournisseur/new', 'FournisseurController@index')->name('newFournisseur');
Route::post('/produits/add/addFournisseur', 'FournisseurController@add')->name('addFournisseur');
Route::get('/fournisseur/{fournisseur}/delete', 'FournisseurController@delete')->name('deleteFournisseur');
Route::get('/fournisseur/{fournisseur}/edit', 'FournisseurController@edit')->name('editFournisseur');
Route::post('/fournisseur/{fournisseur}/update', 'FournisseurController@update')->name('updateFournisseur');


Route::get('/control', 'HomeController@control')->name('control');
Route::post('/update-role/{user}', 'HomeController@updateRole')->name('update-role');