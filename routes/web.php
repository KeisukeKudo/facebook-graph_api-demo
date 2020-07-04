<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('auth/facebook')
    ->namespace('Auth\Facebook')
    ->middleware('guest')
    ->group(static function () {
        Route::get('login', 'LoginController')->name('facebook.login');
        Route::get('callback', 'CallbackController')->name('facebook.callback');
    });

Route::middleware('auth')
    ->group(static function() {
        Route::get('/', fn() => view('welcome'))->name('home');
    });
