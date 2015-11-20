<?php
Route::get('login',['as' =>'login','uses' =>'Auth\AuthController@getLogin']);
Route::post('login',['as' =>'login','uses' =>'Auth\AuthController@PostLogin']);
Route::get('logout',['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);

Route::get('/',['as'=>'register','uses'=>'Auth\AuthController@getRegistertab']);

Route::get('country/select',['as'=>'country/select','uses'=>'StateController@getlist']);

Route:get('city/select',['as'=>'city/select','uses'=>'CityController@getlist']);

Route::get('challenge/select',['as'=>'challenge/select','uses'=>'RelationDeRoController@relationChalle']);

Route::get('check/one',['as'=>'check/one','uses'=>'UserController@checkOne']);
Route::get('check/two',['as'=>'check/two','uses'=>'UserController@checkTwo']);
Route::get('check/three',['as'=>'check/three','uses'=>'UserController@checkThree']);
Route::get('check/name_team',['as'=>'check/name_team','uses'=>'UserController@checkNameTeam']);
Route::get('country/data',['as'=>'country/data','uses'=>'CountryController@index']);


Route::get('prueba/{id}',['as'=>'prueba','uses'=>'CombatRoundController@buildRoundTime']);

Route::get('prueba/dos/{id}',['as'=>'pruebados','uses'=>'CombatRoundController@getindex']);

Route::get('prueba/dos/{id}/envio',['as'=>'pruebados/envio','uses'=>'CombatRoundController@getInfoCombat']);






Route::group(['middleware'=>'auth'],function(){

    Route::get('dashboard',['as'=>'dashboard','uses'=>'UserController@dash']);
    Route::get('challenge',['as'=>'challenge','uses'=>'ChallengeController@index']);
    Route::get('challenge/add',['as'=>'challenge/add','uses'=>'ChallengeController@create']);
    Route::get('challenge/delete',['as'=>'challenge/delete','uses'=>'ChallengeController@destroy']);
    Route::get('editChallen',['as'=>'editChallen','uses' =>'ChallengeController@edit']);


    Route::get('dashboard/stages/{id}',['as'=>'dashboard/stages','uses'=>'StageController@index']);
    Route::get('dashboard/stages/add/{id}',['as'=>'stage/add','uses'=>'StageController@create']);
    Route::get('dashboard/stages/find/{id}',['as'=>'stages/find','uses'=>'StageController@edit']);
    Route::get('dashboard/stages/delete/{id}',['as'=>'stage/delete','uses'=>'StageController@destroy']);

    Route::get('dashboard/groups/{id}',['as'=>'dashboard/groups','uses'=>'GroupController@index']);
    Route::get('dashboard/groups/add/{id}',['as'=>'groups/add','uses'=>'GroupController@create']);
    Route::get('dashboard/groups/find/{id}',['as'=>'groups/find','uses'=>'GroupController@edit']);
    Route::get('dashboard/groups/delete/{id}',['as'=>'groups/delete','uses'=>'GroupController@destroy']);

    Route::get('institutions',['as'=>'institutions','uses'=>'InstitutionController@index']);
    Route::post('institutions',['as'=>'institutions','uses'=>'InstitutionController@update']);
    Route::get('editIns',['as'=>'editIns','uses'=>'InstitutionController@edit']);
    Route::get('add/institutions',['as'=>'add/institutions','uses'=>'InstitutionController@add']);
    Route::get('dashboard/settings',['as'=>'dashboard/settings','uses'=>'SettingsController@index']);
    Route::post('dashboard/settings',['as'=>'dashboard/settings','uses'=>'SettingsController@create']);
    Route::get('dashboard/team/{id}',['as' => 'dashboard/team','uses' =>'TeamController@index']);
    Route::get('dashboard/generator/roud/excel/{id}',['as'=>'dashboard/generator/roud/excel','uses'=>'RoundController@excel']);
    Route::get('dashboard/round/{id}',['as'=>'dashboard/round','uses'=>'RoundController@index']);
    Route::get('dashboard/generator/round/{id}',['as'=>'dashboard/generator/round','uses'=>'RoundController@index']);
    Route::get('dashboard/generator/round/{id}/modification',['as'=>'dashboard/generator/round/{id}/modification','uses'=>'RoundController@modification']);
    Route::get('dashboard/generator/group/{id}',['as'=>'dashboard/generator/group','uses'=>'GroupstaController@index']);
    Route::get('dashboard/generator/group/modifi/{id}',['as'=>'dashboard/generator/group/modifi','uses'=>'GroupstaController@update']);
    Route::get('dashboard/generator/round/fighting/{id}',['as'=>'dashboard/generator/round/fighting','uses'=>'CombatRoundController@index']);

    Route::get('dashboard/fighting/{id}',['as'=>'dashboard/fighting','uses'=>'CombatRoundController@getindex']);

    Route::get('dashboard/fighting/{id}/send',['as'=>'dashboard/fighting/send','uses'=>'CombatRoundController@getInfoCombat']);
    Route::get('dashboard/fighting/{id}/move',['as'=>'dashboard/fighting/move','uses'=>'CombatRoundController@getMove']);
    Route::get('dashboard/fighting/{id}/time',['as'=>'dashboard/fighting/move','uses'=>'CombatRoundController@getTime']);
    Route::get('dashboard/fighting/{id}/serializa',['as'=>'dashboard/fighting/serializa','uses'=>'CombatRoundController@getSeri']);


});

/*
 * 'RoundController@modification'
 * */

//Route::get('dashboard/team/{$id}',['as' => 'dashboard/team','uses' =>'TeamController@index']);



















Route::get('autocompleintitu',['as'=>'autocompleintitu','uses'=>'InstitutionController@autocomplete']);

/*
Route::post('institutions',['as'=>'institutions','uses'=>function(Request $request){
    dd($request->all());
}]);
*/


