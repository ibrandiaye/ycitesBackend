<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route For Citoyen
Route::post('/enregistrer/citoyen', 'CitoyenController@store')
    ->name('enregistrer.citoyen')
    ->middleware('cors');

//Route For Categorie
Route::get('/liste-categories', 'CategorieController@getAllCategorie')
    ->name('liste.categorie')
    ->middleware('cors');

//Route For Reclamation
Route::post('/enregistrer/reclamation', 'ReclamationController@store')
    ->name('enregistrer.reclamation')
    ->middleware('cors');
Route::get('/reclamation/citoyen/{id}', 'reclamationController@getReclamationForCitoyen')
    ->name('reclamation.citoyen')
    ->middleware('cors');
Route::get('/reclamation/{id}', 'reclamationController@getOneReclamationForCitoyen')
    ->name('une.reclamation')
    ->middleware('cors');

//Route for Information
Route::get('/information', 'InformationController@getAllInformationForApi')
    ->name('trente.information')
    ->middleware('cors');

Route::get('/information/{id}', 'InformationController@getOneInformation')
    ->name('une.information')
    ->middleware('cors');