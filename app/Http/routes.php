<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('category/{category}', function(\CodeCommerce\Category $category){

    //dd($category);
    //return $category->name;
//});

//Route::get('produtos', ['as' => 'produtos', function(){
//    echo Route::currentRouteName();
    //return "Produtos";
//}]);

//redirect()->route('produtos');
//echo route('produtos');die;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::group(['prefix' => 'admin'], function(){
    Route::get('products', 'AdminProductsController@index');
    Route::get('categories', 'AdminCategoriesController@index');
});
*/

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function(){

    Route::group(['prefix' => 'categories'], function(){

        Route::get('',['as' => 'categories','uses' => 'CategoriesController@index']);
        Route::post('', ['as' => 'categories.store','uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create','uses' => 'CategoriesController@create']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy','uses' => 'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as' => 'categories.edit','uses' => 'CategoriesController@edit']);
        Route::put('{id}/update', ['as' => 'categories.update','uses' => 'CategoriesController@update']);

    });

    Route::group(['prefix' => 'products'], function(){

        Route::get('', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::post('', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

    });

/*
    Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
    Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
    Route::post('products', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
    Route::get('products/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
    Route::get('products/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
    Route::put('products/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
*/

});


Route::get('home','HomeController@index');

Route::get('exemplo','HomeController@exemplo');

//Route::get('admin/categories', 'AdminCategoriesController@index');
//Route::get('admin/products', 'AdminProductsController@index');