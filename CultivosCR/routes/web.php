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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/map', 'MapController@index')->name('map');
Route::get('garden', 'GardenController@index')->name('garden');
Route::get('garden/{id}', 'GardenController@show');
Route::get('garden/{id}/reviews', 'GardenController@reviews');
Route::get('garden/{id}/photos', 'GardenController@photos');
Route::get('garden/{id}/products', 'GardenController@products');
Route::post('garden/{id}/follow', 'GardenController@follow');
Route::post('garden/{id}/unfollow', 'GardenController@unfollow');

Route::get('users/profile', 'UserController@profile');
Route::get('users/profile/edit', 'UserController@edit');
Route::get('users/{id}', 'UserController@show');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
