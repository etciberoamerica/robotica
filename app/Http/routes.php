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

Route::get('/', function () {
    return view('register');
});


Route::post('register',['as'=>'register','uses'=>function(){
    add('hola');
}]);

Route::get('institutions',['as'=>'institutions','uses'=>'InstitutionController@index']);
Route::post('institutions',['as'=>'institutions','uses'=>'InstitutionController@update']);


Route::get('editIns',['as'=>'editIns','uses'=>'InstitutionController@edit']);


/*
Route::post('institutions',['as'=>'institutions','uses'=>function(Request $request){
    dd($request->all());
}]);
*/


