<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',['as'=>'register','uses'=>'Auth\AuthController@getRegister']);


Route::post('register',['as'=>'register','uses'=>function(){
    add('hola');
}]);


Route::get('holas',['as'=>'register','uses'=>'Auth\AuthController@getRegistertab']);


Route::get('country/select',['as'=>'country/select','uses'=>'StateController@getlist']);

Route:get('city/select',['as'=>'city/select','uses'=>'CityController@getlist']);

Route::get('challenge',['as'=>'challenge','uses'=>'RelationDeRoController@relation']);

Route::get('institutions',['as'=>'institutions','uses'=>'InstitutionController@index']);
Route::post('institutions',['as'=>'institutions','uses'=>'InstitutionController@update']);


Route::get('editIns',['as'=>'editIns','uses'=>'InstitutionController@edit']);

Route::get('autocompleintitu',['as'=>'autocompleintitu','uses'=>'InstitutionController@autocomplete']);

/*
Route::post('institutions',['as'=>'institutions','uses'=>function(Request $request){
    dd($request->all());
}]);
*/


