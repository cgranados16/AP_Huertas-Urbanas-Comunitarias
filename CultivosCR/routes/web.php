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

Route::get('users/profile', 'UserController@profile');
Route::get('users/profile/edit', 'UserController@edit');
Route::get('users/{id}', 'UserController@show');
Route::get('users/{id}/favoriteGardens', 'UserController@favoriteGardens');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/garden/{id}/Sales', 'GardenController@sales');
Route::get('admin/garden/{id}/Sales/create', 'GardenController@createSale')->name('sales/create');
Route::post('admin/garden/{id}/Sales/create', 'GardenController@insertSale')->name('sales/create');
Route::get('admin/garden/{id}/Sales/{idSale}', 'GardenController@saledetail');
Route::get('admin/garden/{id}/Trades/{idTrade}', 'GardenController@tradedetail');
Route::get('admin/garden/{id}/Trades', 'GardenController@trades');
Route::get('admin/garden/{id}/Trades/create', 'GardenController@createTrade')->name('trades/create');

Route::get('admin/garden/{id}', 'GardenController@showAdmin');
Route::get('admin/garden/{id}/products', 'GardenController@productsAdmin');

Route::resource('garden', 'GardenController');
Route::get('garden/{id}/reviews', 'GardenController@reviews');
Route::get('garden/{id}/photos', 'GardenController@photos');
Route::get('garden/{id}/products', 'GardenController@products');
Route::post('garden/{id}/follow', 'GardenController@follow');
Route::post('garden/{id}/unfollow', 'GardenController@unfollow');
Route::get('garden/{id}/estadistica', 'GardenController@estadistica');

Route::resource('admin/garden/{id}/harvest', 'HarvestController');
