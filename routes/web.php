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
    return view('welcome');
});

Route::get('/profile','ProfileController@index')->name('profile.index');
Route::get('/profile/create','ProfileController@create')->name('profile.create');
Route::post('/profile/store','ProfileController@store')->name('profile.store');
Route::get('/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
Route::delete('/profile/delete/{id}','ProfileController@destroy')->name('profile.destroy');
Route::put('profile/update/{id}','ProfileController@update')->name('profile.update');
