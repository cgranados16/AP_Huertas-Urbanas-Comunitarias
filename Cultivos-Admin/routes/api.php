<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('catalogs/color_catalogs', 'Catalogs\ColorCatalogAPIController@index');
Route::post('catalogs/color_catalogs', 'Catalogs\ColorCatalogAPIController@store');
Route::get('catalogs/color_catalogs/{color_catalogs}', 'Catalogs\ColorCatalogAPIController@show');
Route::put('catalogs/color_catalogs/{color_catalogs}', 'Catalogs\ColorCatalogAPIController@update');
Route::patch('catalogs/color_catalogs/{color_catalogs}', 'Catalogs\ColorCatalogAPIController@update');
Route::delete('catalogs/color_catalogs{color_catalogs}', 'Catalogs\ColorCatalogAPIController@destroy');

Route::get('catalogs/vegetable_type_catalogs', 'Catalogs\VegetableTypeCatalogAPIController@index');
Route::post('catalogs/vegetable_type_catalogs', 'Catalogs\VegetableTypeCatalogAPIController@store');
Route::get('catalogs/vegetable_type_catalogs/{vegetable_type_catalogs}', 'Catalogs\VegetableTypeCatalogAPIController@show');
Route::put('catalogs/vegetable_type_catalogs/{vegetable_type_catalogs}', 'Catalogs\VegetableTypeCatalogAPIController@update');
Route::patch('catalogs/vegetable_type_catalogs/{vegetable_type_catalogs}', 'Catalogs\VegetableTypeCatalogAPIController@update');
Route::delete('catalogs/vegetable_type_catalogs{vegetable_type_catalogs}', 'Catalogs\VegetableTypeCatalogAPIController@destroy');

Route::get('catalogs/vegetable_properties_catalogs', 'Catalogs\VegetablePropertiesCatalogAPIController@index');
Route::post('catalogs/vegetable_properties_catalogs', 'Catalogs\VegetablePropertiesCatalogAPIController@store');
Route::get('catalogs/vegetable_properties_catalogs/{vegetable_properties_catalogs}', 'Catalogs\VegetablePropertiesCatalogAPIController@show');
Route::put('catalogs/vegetable_properties_catalogs/{vegetable_properties_catalogs}', 'Catalogs\VegetablePropertiesCatalogAPIController@update');
Route::patch('catalogs/vegetable_properties_catalogs/{vegetable_properties_catalogs}', 'Catalogs\VegetablePropertiesCatalogAPIController@update');
Route::delete('catalogs/vegetable_properties_catalogs{vegetable_properties_catalogs}', 'Catalogs\VegetablePropertiesCatalogAPIController@destroy');

Route::get('catalogs/tree_family_catalogs', 'Catalogs\TreeFamilyCatalogAPIController@index');
Route::get('catalogs/tree_family_catalogs/{tree_family_catalogs}', 'Catalogs\TreeFamilyCatalogAPIController@show');

Route::get('catalogs/fertilizer_catalogs', 'Catalogs\FertilizerCatalogAPIController@index');
Route::post('catalogs/fertilizer_catalogs', 'Catalogs\FertilizerCatalogAPIController@store');
Route::get('catalogs/fertilizer_catalogs/{fertilizer_catalogs}', 'Catalogs\FertilizerCatalogAPIController@show');
Route::put('catalogs/fertilizer_catalogs/{fertilizer_catalogs}', 'Catalogs\FertilizerCatalogAPIController@update');
Route::patch('catalogs/fertilizer_catalogs/{fertilizer_catalogs}', 'Catalogs\FertilizerCatalogAPIController@update');
Route::delete('catalogs/fertilizer_catalogs{fertilizer_catalogs}', 'Catalogs\FertilizerCatalogAPIController@destroy');


Route::get('catalogs/tree_order_catalogs', 'Catalogs\TreeOrderCatalogAPIController@index');
Route::get('catalogs/tree_order_catalogs/{tree_order_catalogs}', 'Catalogs\TreeOrderCatalogAPIController@show');

Route::resource('trees', 'TreeAPIController');