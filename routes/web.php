<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('app');
});

Route::get('/products', function () {
    return 'get success';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('api/auth/{provider}/url', 'Api\Auth\SocialController@loginUrl');
Route::get('api/auth/{provider}/callback', 'Api\Auth\SocialController@loginCallback');