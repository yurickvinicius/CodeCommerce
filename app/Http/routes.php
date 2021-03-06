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

Route::get('/','StoreController@index');

/*
Route::group(['prefix' => 'admin'], function(){
    Route::get('products', 'AdminProductsController@index');
    Route::get('categories', 'AdminCategoriesController@index');
});
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'where' => ['id' => '[0-9]+']], function(){

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

        Route::group(['prefix' => 'images'], function(){

            Route::get('{id}/product',['as' => 'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/{id}/product',['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/{id}/product',['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::get('destroy/{id}/image',['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);

        });

        Route::group(['prefix' => 'tags'], function(){
            Route::get('{id}', ['as' => 'products.tags', 'uses' => 'ProductsController@tags']);
            Route::get('{id}/create', ['as' => 'products.tags.create', 'uses' => 'ProductsController@createTag']);
            Route::post('{id}/store', ['as' => 'products.tags.store', 'uses' => 'ProductsController@storeTag']);
            Route::get('{tag_id}/{product_id}/destroy', ['as' => 'products.tags.destroy', 'uses' => 'ProductsController@destroyTag']);
        });

    });

    Route::group(['prefix' => 'tags'], function(){
        Route::get('', ['as' => 'tags', 'uses' => 'TagsController@index']);
        Route::get('create', ['as' => 'tags.create', 'uses' => 'TagsController@create']);
        Route::post('store', ['as' => 'tags.store', 'uses' => 'TagsController@store']);
        Route::get('destroy/{id}', ['as' => 'tags.destroy', 'uses' => 'TagsController@destroy']);
        Route::get('edit/{id}', ['as' => 'tags.edit', 'uses' => 'TagsController@edit']);
        Route::post('update/{id}', ['as' => 'tags.update', 'uses' => 'TagsController@update']);
    });

});

Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);

Route::get('cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add']);
Route::get('cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy']);

Route::group(['middleware' => 'auth'], function(){
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::get('test','CheckoutController@test');

Route::get('evento', function(){

    ///\Illuminate\Support\Facades\Event::fire(new \CodeCommerce\Events\CheckoutEvent());
    event(new \CodeCommerce\Events\CheckoutEvent());

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test' => 'TestController'
]);