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
Route::get('/programmer', 'ProduitController@show')->name('programmer');

Route::post('/produits/add/addClient', 'ClientController@add')->name('addClient');