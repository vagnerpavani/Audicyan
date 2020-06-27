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

Route::post('register', 'UserController@CreateUser');
Route::get('showUser/{id}','UserController@ShowUser');
Route::get('listUsers', 'UserController@ListUsers');
Route::put('editUser/{id}','UserController@UpdateUser');
Route::delete('deleteUser/{id}','UserController@DeleteUser');