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


Route::get('/', function () {
    return view('welcome');
})->middleware('auth');*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');;

Route::resource('categories', 'CategorieController')->middleware('auth');;
Route::resource('reclamations','ReclamationController')->middleware('auth');;
Route::get('/reclamation/{id}', 'ReclamationController@valider')->name('reclamation.valider')->middleware('auth');;
Route::resource('informations','InformationController')->middleware('auth');
Route::resource('collectivite','CollectiviteController')->middleware('auth');
Route::resource('citoyen','CitoyenController')->middleware('auth');
Route::get('/personne/{type}', 'CitoyenController@getByType')->name('citoyen.type')->middleware('auth');
Route::resource('elu','EluController')->middleware('auth');
Route::get('/elu/liste', 'EluController@getElu')->name('liste.elu')->middleware('auth');