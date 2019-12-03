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
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');;

Route::resource('categories', 'CategorieController')->middleware('auth');;
Route::resource('reclamations','ReclamationController')->middleware('auth');;
Route::get('/reclamation/{id}', 'ReclamationController@valider')->name('reclamation.valider')->middleware('auth');;
Route::resource('informations','InformationController')->middleware('auth');