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

Route::get('login', fn() => view('auth.login'))->name('login');

Route::prefix('auth/facebook')
    ->namespace('Auth\Facebook')
    ->group(static function () {
        Route::get('oauth/login', 'LoginController')->name('facebook.login');
        Route::get('callback', 'CallbackController')->name('facebook.callback');
    });

Route::middleware('auth')
    ->group(static function () {
        Route::get('/', fn() => view('user.facebook.me'))->name('home');
    });
