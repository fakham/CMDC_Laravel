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

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/{user}/update', 'ProfileController@update')->name('updateProfile');

Route::get('/charges/add', 'ChargeController@add')->name('addCharge');
Route::get('/charges', 'ChargeController@show')->name('charges');

Route::get('/recettes/add', 'RecetteController@add')->name('addRecette');
Route::get('/recettes', 'RecetteController@show')->name('recettes');

Route::get('/produits/add', 'ProduitController@add')->name('addProduit');
Route::post('/produits/add/{client}/addRecette', 'ProduitController@addRecette')->name('addProduitRecette');
Route::post('/produits/add/{fournisseur}/addCharge', 'ProduitController@addCharge')->name('addProduitCharge');

Route::get('/programmer', 'ProduitController@show')->name('programmer');
Route::get('/produit/{produit}/delete', 'ProduitController@delete')->name('deleteProduit');

Route::post('/produits/add/addClient', 'ClientController@add')->name('addClient');
Route::get('/client/{client}/delete', 'ClientController@delete')->name('deleteClient');
Route::get('/client/{client}/edit', 'ClientController@edit')->name('editClient');
Route::post('/client/{client}/update', 'ClientController@update')->name('updateClient');

Route::post('/produits/add/addFournisseur', 'FournisseurController@add')->name('addFournisseur');
Route::get('/fournisseur/{fournisseur}/delete', 'FournisseurController@delete')->name('deleteFournisseur');
Route::get('/fournisseur/{fournisseur}/edit', 'FournisseurController@edit')->name('editFournisseur');
Route::post('/fournisseur/{fournisseur}/update', 'FournisseurController@update')->name('updateFournisseur');