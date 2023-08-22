<?php

use App\Http\Controllers\Api\V1\ProductApiController;

use App\Http\Controllers\Api\V1\CountryCityApiController;



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {

    Route::post('login', 'UserApiController@login')->name('login');
    Route::post('register', 'UserApiController@register')->name('register');
    Route::post('verify', 'UserApiController@verify')->name('Verify');
    Route::get('cities/{country}','CountryCityApiController@ShowCity')->name('cities');
    Route::get('Countries','CountryCityApiController@ShowCountry')->name('Countries');
    Route::get('resturants', 'UserApiController@resturants')->name('resturants');
    Route::post('password/email', 'ForgotPasswordApiController  @forgot');
    Route::post('password/reset', 'ForgotPasswordApiController  @reset');
     // Product
     Route::get('showproductsbyresturant/{resturant}','ProductApiController@getProductsByResturant');
     Route::get('`showproductsbycategory`/{category_id}','ProductApiController@getProductsByCategory');
     Route::get('product/{id}', 'ProductApiController@productshow');
     Route::get('getproductbybestseller','ProductApiController@getproductbybestseller');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1', 'middleware' => ['auth:sanctum']], function () {


    Route::get('profile',  'UserApiController@profile')->name('profile');
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
   // Route::apiResource('products', 'ProductApiController');

     // Resturants
     Route::get('resturant/{id}', 'ResturantsApiController@resturantsshow');

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
