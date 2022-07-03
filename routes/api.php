<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/product-categories', 'Api\ProductCategoryController@index')->name('productCategory.index');
Route::post('/product-category', 'Api\ProductCategoryController@create')->name('productCategory.create');
Route::put('/product-category/{id}', 'Api\ProductCategoryController@update')->name('productCategory.update');
Route::delete('/product-category/{id}', 'Api\ProductCategoryController@delete')->name('productCategory.delete');