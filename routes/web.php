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

Route::resource('clients', 'ClientController');
Route::resource('offres', 'OffreController');
Route::resource('diffusions', 'DiffusionController');
Route::resource('commandes', 'CommandeController');
Route::resource('utilisateurs', 'UserController');

Route::get('evaluation/date', 'EvaluationController@index')->name('evaluation.date');
Route::get('evaluation/name', 'EvaluationController@show')->name('evaluation.name');

Route::post('evaluation/date', 'EvaluationController@create')->name('evaluation.date');
Route::post('evaluation/name', 'EvaluationController@store')->name('evaluation.name');
