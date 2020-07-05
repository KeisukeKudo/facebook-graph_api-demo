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

Route::middleware('auth')
    ->prefix('facebook')
    ->namespace('API\GraphAPI')
    ->group(static function () {
        Route::get('me', 'UserController@get')->name('api.facebook.me');
    });
