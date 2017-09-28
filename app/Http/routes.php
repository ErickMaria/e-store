<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['web']], function () {
  
  Route::post('store',                  'RegisterUserController@store');
  
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    
    Route::get('details_product/{id}',    'ProductController@show');
    Route::post('search',                 'ProductController@search');
    Route::get('filter_category/{id}',    'CategoryController@filterCategorybyPoduct');
    Route::get('/',                       'ProductController@index');    
    
    Route::get('logout',                  'AppController@logout');
  
    Route::post('freight',                 'FreightController@freight');
    Route::get('freight_store/{id_checkout}/{user_zip}/{zipcode}/{type_freight}/{value}/{delivery}',                   'FreightController@store');
    
    Route::get('checkout',                'CheckoutController@index');
    Route::get('checkout/{id}/{zipcode}/{type_freight}/{id_cart?}',  'CheckoutController@store');
    Route::get('incrementCheckout/{id}',  'CheckoutController@incrementProductCheckout');
    Route::get('decrementCheckout/{id}',  'CheckoutController@decrementProductCheckout');
    Route::get('delete_checkout/{id}',    'CheckoutController@deleteCheckout');
    
    Route::get('cart',                    'CartController@index');
    Route::get('addCart/{id}',            'CartController@addCart');
    Route::get('incrementCart/{id}',      'CartController@incrementProductCart');
    Route::get('decrementCart/{id}',      'CartController@decrementProductCart');
    Route::get('delete_cart/{id}',        'CartController@deleteCart');
    
    Route::get('order',                   'OrderController@index');
    Route::get('buy_finish/{id}',         'OrderController@buyFinish');
    Route::get('cancele_order/{id}',      'OrderController@canceleOrder');
});

