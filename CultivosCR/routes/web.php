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
Route::get('users/profile/edit', 'UserController@edit')->name('user.edit');
Route::post('users/profile/edit/profile', 'UserController@updateProfile')->name('user.updateProfile');
Route::post('users/profile/edit/password', 'UserController@updatePassword')->name('user.updatePassword');
Route::post('users/profile/edit/info', 'UserController@updateInfo')->name('user.updateInfo');
Route::post('users/profile/edit/photo', 'UserController@updatePhoto')->name('user.updatePhoto');
Route::get('users/{id}', 'UserController@show');
Route::get('/favoriteGardens', 'UserController@favoriteGardens');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/garden/{id}/Sales', 'GardenController@sales')->name('sales');
Route::get('admin/garden/{id}/Sales/create', 'GardenController@createSale')->name('sales/create');
Route::post('admin/garden/{id}/Sales/create', 'GardenController@insertSale')->name('sales/create');
Route::get('admin/garden/{id}/Sales/{idSale}', 'GardenController@saledetail');
Route::get('admin/garden/{id}/Trades', 'GardenController@trades')->name('trades');
Route::get('admin/garden/{id}/Trades/{idTrade}', 'GardenController@tradedetail');
Route::get('admin/garden/{id}/Trades/create', 'GardenController@createTrade')->name('trades/create');

Route::get('admin/garden/{id}', 'GardenController@showAdmin');
Route::get('admin/garden/{id}/products', 'GardenController@productsAdmin');
Route::post('admin/garden/{id}', 'GardenController@storeReview')->name('gardens.review');
Route::delete('admin/garden/{id}', 'GardenController@destroyReview')->name('gardens.review.destroy');

Route::resource('garden', 'GardenController');
Route::get('garden/{id}/reviews', 'GardenController@reviews');
Route::get('garden/{id}/photos', 'GardenController@photos');
Route::get('garden/{id}/products', 'GardenController@products');
Route::post('garden/{id}/follow', 'GardenController@follow');
Route::post('garden/{id}/unfollow', 'GardenController@unfollow');
Route::get('garden/{id}/estadistica', 'GardenController@estadistica');

Route::resource('admin/garden/{id}/harvest', 'HarvestController');
Route::get('harvest/Photo', 'HarvestController@photo')->name('harvest.photo');
