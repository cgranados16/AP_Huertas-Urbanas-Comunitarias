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


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

Route::get('catalogs/colorCatalogs', ['as'=> 'catalogs.colorCatalogs.index', 'uses' => 'Catalogs\ColorCatalogController@index']);
Route::post('catalogs/colorCatalogs', ['as'=> 'catalogs.colorCatalogs.store', 'uses' => 'Catalogs\ColorCatalogController@store']);
Route::get('catalogs/colorCatalogs/create', ['as'=> 'catalogs.colorCatalogs.create', 'uses' => 'Catalogs\ColorCatalogController@create']);
Route::put('catalogs/colorCatalogs/{colorCatalogs}', ['as'=> 'catalogs.colorCatalogs.update', 'uses' => 'Catalogs\ColorCatalogController@update']);
Route::patch('catalogs/colorCatalogs/{colorCatalogs}', ['as'=> 'catalogs.colorCatalogs.update', 'uses' => 'Catalogs\ColorCatalogController@update']);
Route::delete('catalogs/colorCatalogs/{colorCatalogs}', ['as'=> 'catalogs.colorCatalogs.destroy', 'uses' => 'Catalogs\ColorCatalogController@destroy']);
Route::get('catalogs/colorCatalogs/{colorCatalogs}', ['as'=> 'catalogs.colorCatalogs.show', 'uses' => 'Catalogs\ColorCatalogController@show']);
Route::get('catalogs/colorCatalogs/{colorCatalogs}/edit', ['as'=> 'catalogs.colorCatalogs.edit', 'uses' => 'Catalogs\ColorCatalogController@edit']);


Route::get('catalogs/vegetableTypeCatalogs', ['as'=> 'catalogs.vegetableTypeCatalogs.index', 'uses' => 'Catalogs\VegetableTypeCatalogController@index']);
Route::post('catalogs/vegetableTypeCatalogs', ['as'=> 'catalogs.vegetableTypeCatalogs.store', 'uses' => 'Catalogs\VegetableTypeCatalogController@store']);
Route::get('catalogs/vegetableTypeCatalogs/create', ['as'=> 'catalogs.vegetableTypeCatalogs.create', 'uses' => 'Catalogs\VegetableTypeCatalogController@create']);
Route::put('catalogs/vegetableTypeCatalogs/{vegetableTypeCatalogs}', ['as'=> 'catalogs.vegetableTypeCatalogs.update', 'uses' => 'Catalogs\VegetableTypeCatalogController@update']);
Route::patch('catalogs/vegetableTypeCatalogs/{vegetableTypeCatalogs}', ['as'=> 'catalogs.vegetableTypeCatalogs.update', 'uses' => 'Catalogs\VegetableTypeCatalogController@update']);
Route::delete('catalogs/vegetableTypeCatalogs/{vegetableTypeCatalogs}', ['as'=> 'catalogs.vegetableTypeCatalogs.destroy', 'uses' => 'Catalogs\VegetableTypeCatalogController@destroy']);
Route::get('catalogs/vegetableTypeCatalogs/{vegetableTypeCatalogs}', ['as'=> 'catalogs.vegetableTypeCatalogs.show', 'uses' => 'Catalogs\VegetableTypeCatalogController@show']);
Route::get('catalogs/vegetableTypeCatalogs/{vegetableTypeCatalogs}/edit', ['as'=> 'catalogs.vegetableTypeCatalogs.edit', 'uses' => 'Catalogs\VegetableTypeCatalogController@edit']);


Route::get('catalogs/vegetablePropertiesCatalogs', ['as'=> 'catalogs.vegetablePropertiesCatalogs.index', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@index']);
Route::post('catalogs/vegetablePropertiesCatalogs', ['as'=> 'catalogs.vegetablePropertiesCatalogs.store', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@store']);
Route::get('catalogs/vegetablePropertiesCatalogs/create', ['as'=> 'catalogs.vegetablePropertiesCatalogs.create', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@create']);
Route::put('catalogs/vegetablePropertiesCatalogs/{vegetablePropertiesCatalogs}', ['as'=> 'catalogs.vegetablePropertiesCatalogs.update', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@update']);
Route::patch('catalogs/vegetablePropertiesCatalogs/{vegetablePropertiesCatalogs}', ['as'=> 'catalogs.vegetablePropertiesCatalogs.update', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@update']);
Route::delete('catalogs/vegetablePropertiesCatalogs/{vegetablePropertiesCatalogs}', ['as'=> 'catalogs.vegetablePropertiesCatalogs.destroy', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@destroy']);
Route::get('catalogs/vegetablePropertiesCatalogs/{vegetablePropertiesCatalogs}', ['as'=> 'catalogs.vegetablePropertiesCatalogs.show', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@show']);
Route::get('catalogs/vegetablePropertiesCatalogs/{vegetablePropertiesCatalogs}/edit', ['as'=> 'catalogs.vegetablePropertiesCatalogs.edit', 'uses' => 'Catalogs\VegetablePropertiesCatalogController@edit']);


Route::get('catalogs/fertilizerCatalogs', ['as'=> 'catalogs.fertilizerCatalogs.index', 'uses' => 'Catalogs\FertilizerCatalogController@index']);
Route::post('catalogs/fertilizerCatalogs', ['as'=> 'catalogs.fertilizerCatalogs.store', 'uses' => 'Catalogs\FertilizerCatalogController@store']);
Route::get('catalogs/fertilizerCatalogs/create', ['as'=> 'catalogs.fertilizerCatalogs.create', 'uses' => 'Catalogs\FertilizerCatalogController@create']);
Route::put('catalogs/fertilizerCatalogs/{fertilizerCatalogs}', ['as'=> 'catalogs.fertilizerCatalogs.update', 'uses' => 'Catalogs\FertilizerCatalogController@update']);
Route::patch('catalogs/fertilizerCatalogs/{fertilizerCatalogs}', ['as'=> 'catalogs.fertilizerCatalogs.update', 'uses' => 'Catalogs\FertilizerCatalogController@update']);
Route::delete('catalogs/fertilizerCatalogs/{fertilizerCatalogs}', ['as'=> 'catalogs.fertilizerCatalogs.destroy', 'uses' => 'Catalogs\FertilizerCatalogController@destroy']);
Route::get('catalogs/fertilizerCatalogs/{fertilizerCatalogs}', ['as'=> 'catalogs.fertilizerCatalogs.show', 'uses' => 'Catalogs\FertilizerCatalogController@show']);
Route::get('catalogs/fertilizerCatalogs/{fertilizerCatalogs}/edit', ['as'=> 'catalogs.fertilizerCatalogs.edit', 'uses' => 'Catalogs\FertilizerCatalogController@edit']);

Route::resource('trees', 'TreeController');
Route::post('trees/photo', 'TreeController@destroyPhoto')->name('trees.destroy_photo');
Route::get('vegetables/getdata', 'VegetableController@getVegetables')->name('vegetables/getdata');
Route::resource('vegetables', 'VegetableController');
Route::post('vegetables/photo', 'VegetableController@destroyPhoto')->name('vegetables.destroy_photo');
Route::post('vegetables/create/photos', ['as'=> 'vegetables.create.store', 'uses' => 'VegetableController@photos_upload']);

Route::resource('admin', 'AdminController');
