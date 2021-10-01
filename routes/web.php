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

Route::get('/', 'AdminController@index');

Route::post('auth/login', 'Auth/LoginController@index');

Route::get('/liste_agents', 'AdminController@listAgents');
Route::get('/liste_hotel', 'AdminController@listHotel');
Route::get('/liste_utilisateur', 'AdminController@listUtilisateur');
Route::get('/agent/{id}', 'AdminController@agentInfo');
Route::get('/utilisateur/{id}', 'AdminController@utilisateurInfo');
Route::get('/ajout_espace', 'AdminController@espace');
Route::get('/ajout_agent', 'AdminController@agent');
Route::get('/liste_espace', 'AdminController@listEspaces');
Route::get('/detail_espace/{id}', 'AdminController@detailEspace');
Route::get('/detail_hotel/{id}', 'AdminController@detailHotel');

Route::post('/save/espace', 'AdminController@saveEspace');

Route::post('/register_hotel_agent','AdminController@register');




Auth::routes();

Route::get('/home', 'AdminController@home')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
