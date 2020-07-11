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

//users routes
Route::post('register', 'UserController@CreateUser');
Route::get('showUser/{id}','UserController@ShowUser');
Route::get('listUsers', 'UserController@ListUsers');
Route::put('editUser/{id}','UserController@UpdateUser');
Route::delete('deleteUser/{id}','UserController@DeleteUser');

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