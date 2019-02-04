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

Auth::routes();

Route::get('language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return back();
})->name('langroute');


Route::get('language/{language}', 'HomeController@setLanguage');

Route::group(['middleware' => 'auth'], function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('users', 'UserController');
        Route::get('users-data', 'UserController@data');

        Route::resource('clients', 'ClientController');
        Route::get('clients-data', 'ClientController@data');

        Route::resource('suppliers', 'SupplierController');
        Route::get('suppliers-data', 'SupplierController@data');

        Route::resource('car-part-cards', 'CarPartCardController');
        Route::get('car-part-cards-data', 'CarPartCardController@data');
        Route::get('car-part-cards/image', 'CarPartCardController@image');
        Route::get('car-parts-data/{id}', 'CarPartController@data');
        Route::get('product-subgroups-data/{id}', 'ProductSubgroupController@productSubgroupData');

        Route::resource('car-parts', 'CarPartController');

        Route::resource('purchases', 'PurchaseController');

});