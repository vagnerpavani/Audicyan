<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('register', 'API\PassportController@Register');
Route::post('login', 'API\PassportController@Login');
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('logout', 'API\PassportController@Logout');
});


//users routes
Route::post('UserRegister', 'UserController@CreateUser');
Route::get('ShowUser/{id}','UserController@ShowUser');
Route::get('ListUsers', 'UserController@ListUsers');
Route::put('EditUser/{id}','UserController@UpdateUser');
Route::delete('DeleteUser/{id}','UserController@DeleteUser');
//user->instruments
Route::get('userInstruments/{id}','UserController@GetUserInstruments');
Route::post('insertUserInstrument/{user_id}/{instrument_id}', 'UserController@InstertUserInstrument');
Route::delete('deleteUserInstrument/{user_id}/{instrument_id}', 'UserController@EraseUserInstrument');
//user->skills
Route::get('userSkills/{id}','UserController@GetUserSkills');
Route::post('insertUserSkill/{user_id}/{skill_id}', 'UserController@InstertUserSkill');
Route::delete('deleteUserSkill/{user_id}/{skill_id}', 'UserController@EraseUserSkill');
//user->materials
Route::get('userMaterials/{id}','UserController@GetUserMaterials');
Route::post('insertUserMaterial/{user_id}', 'UserController@InstertUserMaterial');
Route::delete('deleteUserMaterial/{user_id}/{material_id}', 'UserController@EraseUserMaterial');
//user matchs
Route::get('userMatchs/{id}','UserController@GetUserMatchs');
Route::post('insertUserMatch/{user_id}/{other_user_id}', 'UserController@InstertUserMatch');
Route::delete('deleteUserMatch/{user_id}/{other_user_id}', 'UserController@EraseUserMatch');
    

//instruments routes
Route::post('registerInstrument', 'InstrumentController@CreateInstrument');
Route::get('showInstrument/{id}','InstrumentController@ShowInstrument');
Route::get('listInstrument', 'InstrumentController@ListInstruments');
Route::put('editInstrument/{id}','InstrumentController@UpdateInstrument');
Route::delete('deleteInstrument/{id}','InstrumentController@DeleteInstrument');

//skills routes
Route::post('registerSkill', 'SkillController@CreateSkill');
Route::get('showSkill/{id}','SkillController@ShowSkill');
Route::get('listSkill', 'SkillController@ListSkill');
Route::put('editSkill/{id}','SkillController@UpdateSkill');
Route::delete('deleteSkill/{id}','SkillController@DeleteSkill');

//materials routes
Route::post('registerMaterial', 'MaterialController@CreateMaterial');
Route::get('showMaterial/{id}','MaterialController@ShowMaterial');
Route::get('listMaterial', 'MaterialController@ListMaterial');
Route::put('editMaterial/{id}','MaterialController@UpdateMaterial');
Route::delete('deleteMaterial/{id}','MaterialController@DeleteMaterial');