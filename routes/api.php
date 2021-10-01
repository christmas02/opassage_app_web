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

Route::post('filter','ApiController@filtres');

Route::middleware('auth:api')->group(function (){

    Route::get('liste_espace_default','ApiController@listeEspaceDefault');
    Route::get('liste_montant','ApiController@listMontant');
    Route::get('liste_commune','ApiController@listCommune');
    Route::get('liste_categorie','ApiController@listCayegorie');
    Route::get('liste_jours','ApiController@listJours');
    Route::get('liste_espaces_sponsorring','ApiController@espaceSponsorisez');

    Route::post('save_espace','ApiController@saveEspace');
    Route::post('save_agent_hotel','ApiController@registerAgent');

});
