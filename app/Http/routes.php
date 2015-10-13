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


Route::get('add/institutions',['as'=>'add/institutions','uses'=>'InstitutionController@add']);


Route::get('/',['as'=>'/','uses'=>'Auth\AuthController@getRegistertab']);


Route::get('country/select',['as'=>'country/select','uses'=>'StateController@getlist']);

Route:get('city/select',['as'=>'city/select','uses'=>'CityController@getlist']);

//Route::get('challenge',['as'=>'challenge','uses'=>'RelationDeRoController@relation']);

Route::get('challenge/select',['as'=>'challenge/select','uses'=>'RelationDeRoController@relationChalle']);


Route::get('check/one',['as'=>'check/one','uses'=>'UserController@checkOne']);
Route::get('check/two',['as'=>'check/two','uses'=>'UserController@checkTwo']);
Route::get('check/three',['as'=>'check/three','uses'=>'UserController@checkThree']);
Route::get('check/name_team',['as'=>'check/name_team','uses'=>'UserController@checkNameTeam']);


Route::get('dashboard',['as'=>'dashboard','uses'=>'UserController@dash']);



Route::get('challenge',['as'=>'challenge','uses'=>'ChallengeController@index']);
Route::get('challenge/add',['as'=>'challenge/add','uses'=>'ChallengeController@create']);
Route::get('challenge/delete',['as'=>'challenge/delete','uses'=>'ChallengeController@destroy']);

Route::get('editChallen',['as'=>'editChallen','uses' =>'ChallengeController@edit']);


Route::get('stages',['as'=>'stages','uses'=>'StageController@index']);
Route::get('stages/find',['as'=>'stages/find','uses'=>'StageController@edit']);
Route::get('stage/add',['as'=>'stage/add','uses'=>'StageController@create']);
Route::get('stage/delete',['as'=>'stage/delete','uses'=>'StageController@destroy']);





Route::get('institutions',['as'=>'institutions','uses'=>'InstitutionController@index']);
Route::post('institutions',['as'=>'institutions','uses'=>'InstitutionController@update']);


Route::get('editIns',['as'=>'editIns','uses'=>'InstitutionController@edit']);

Route::get('autocompleintitu',['as'=>'autocompleintitu','uses'=>'InstitutionController@autocomplete']);

/*
Route::post('institutions',['as'=>'institutions','uses'=>function(Request $request){
    dd($request->all());
}]);
*/


