<?php

use App\Http\Controllers\Api\V1\ProductApiController;
use App\Http\Controllers\Api\V1\HomePageApiController;
use App\Http\Controllers\Api\V1\User_favApiController;
use App\Http\Controllers\Api\V1\UserCartApiController;
use App\Http\Controllers\Api\V1\UserOrdersApiController;
use App\Http\Controllers\Api\V1\CountryCityApiController;
use App\Http\Controllers\api\V1\ForgotPasswordApiController;




Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {

    Route::post('login', 'UserApiController@login')->name('login');
    Route::post('register', 'UserApiController@register')->name('register');
    Route::post('verify', 'UserApiController@verify')->name('Verify');
    Route::get('cities/{country}','CountryCityApiController@ShowCity')->name('cities');
    Route::get('Countries','CountryCityApiController@ShowCountry')->name('Countries');
    Route::get('resturants', 'UserApiController@resturants')->name('resturants');
    Route::post('password/email', 'ForgotPasswordApiController@forgot');
    Route::post('password/reset', 'ForgotPasswordApiController@reset');
     // Product
     Route::get('showproductsbyresturant/{restura1nt}','ProductApiController@getProductsByResturant');
     Route::get('showproductsbycategory/{category_id}','ProductApiController@getProductsByCategory');
     Route::get('product/{id}', 'ProductApiController@productshow');
     Route::get('getproductbybestseller','ProductApiController@getproductbybestseller');
     Route::post('product_search/{search}','ProductApiController@product_search');
     Route::get('homebage','HomePageApiController@index')->name('homebage');

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
   Route::apiResource('myfavorites', 'User_favApiController');

    // Notification
  //  Route::apiResource('notifications', 'NotificationApiController');

    // Orders
   Route::apiResource('orders', 'OrdersApiController');
   Route::get('orders/{id}', 'OrdersApiController@orderdetails');
   Route::apiResource('myorders', 'UserOrdersApiController');

   
   Route::apiResource('usercart', 'UserCartApiController');

    // Addresses
    //Route::apiResource('addresses', 'AddressesApiController');
});
