<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/github', 'Auth\LoginController@github');
Route::get('/github/redirect', 'Auth\LoginController@githubRedirect');

Route::get('/line', 'Auth\LoginController@line');
Route::get('/line/redirect', 'Auth\LoginController@lineRedirect');

Route::post('/botman', function() {
    app('botman')->listen();
});

Route::group(['namespace' => 'Api'], function() {
    Route::post('/line/webhook', 'LineWebhookController@webhook')->name('line.webhook');
});

