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

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([

  'middleware' => 'api',
 // 'prefix' => 'auth'
], function ($router) {

  Route::post('login', 'Auth\AuthController@login');
  Route::post('logout', 'Auth\AuthController@logout');
  Route::post('refresh', 'Auth\AuthController@refresh');
  Route::get('user', 'Auth\AuthController@user');

});

Route::prefix('admin')->
    namespace('Admin')
   ->middleware(['auth:api', 'employee'])
    ->name('admin')
    ->group(function () {
      //  Route::apiResource('users', 'UserController');
    });
