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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'clinic',
    'namespace' => 'Clinic',
    'as' => 'clinic.'
], function () {
    Route::get('login', 'LoginController@showLoginPage')->name('login');
    Route::post('login', 'LoginController@login')->name('login.action');
});

Route::group([
    'prefix' => 'doctor',
    'namespace' => 'Doctor',
    'as' => 'doctor.'
], function () {
    Route::get('login', 'LoginController@showLoginPage')->name('login');
    Route::post('login', 'LoginController@login')->name('login.action');
});
