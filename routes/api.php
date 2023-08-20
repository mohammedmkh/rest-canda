<?php

use App\Http\Controllers\Api\V1\ProductApiController;

use App\Http\Controllers\Api\V1\CountryCityApiController;



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {
    // Product
    Route::post('login', 'UserApiController@login')->name('login');
    Route::post('register', 'UserApiController@register')->name('register');
    Route::post('verify', 'UserApiController@verify')->name('Verify');
    Route::get('cities/{country}','CountryCityApiController@ShowCity')->name('cities');
    Route::get('Countries','CountryCityApiController@ShowCountry')->name('Countries');
    Route::get('resturants', 'UserApiController@resturants')->name('resturants');
    Route::post('password/email', 'ForgotPasswordApiController@forgot');
    Route::post('password/reset', 'ForgotPasswordApiController@reset');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1', 'middleware' => ['auth:sanctum']], function () {
    // Product

    Route::get('profile',  'UserApiController@profile')->name('profile');
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
   // Route::apiResource('products', 'ProductApiController');

     Route::get('showproductsbyresturant/{resturant}','ProductApiController@getProductsByResturant');
     Route::get('`showproductsbycategory`/{category_id}','ProductApiController@getProductsByCategory');
     Route::get('product/{id}', 'ProductApiController@productshow');
     Route::get('resturant/{id}', 'ResturantsApiController@resturantsshow');
    // Resturants
    //  Route::post('resturants/media', 'ResturantsApiController@storeMedia')->name('resturants.storeMedia');
    // Route::apiResource('resturants', 'ResturantsApiController');

    // Additionals
   // Route::apiResource('additionals', 'AdditionalsApiController');

    // Favorite
  //  Route::apiResource('favorites', 'FavoriteApiController');

    // Notification
  //  Route::apiResource('notifications', 'NotificationApiController');

    // Orders
   // Route::apiResource('orders', 'OrdersApiController');

    // Addresses
    //Route::apiResource('addresses', 'AddressesApiController');
});
