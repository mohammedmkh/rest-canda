<?php



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1'], function () {
    // Product
    Route::post('login', 'UserApiController@login')->name('login');
    Route::post('register', 'UserApiController@register')->name('register');

    Route::get('resturants', 'UserApiController@resturants')->name('resturants');
});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1', 'middleware' => ['auth:sanctum']], function () {
    // Product

    Route::get('profile',  'UserApiController@profile')->name('profile');
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Resturants
    //  Route::post('resturants/media', 'ResturantsApiController@storeMedia')->name('resturants.storeMedia');
    // Route::apiResource('resturants', 'ResturantsApiController');

    // Additionals
    Route::apiResource('additionals', 'AdditionalsApiController');

    // Favorite
    Route::apiResource('favorites', 'FavoriteApiController');

    // Notification
    Route::apiResource('notifications', 'NotificationApiController');

    // Orders
    Route::apiResource('orders', 'OrdersApiController');

    // Addresses
    Route::apiResource('addresses', 'AddressesApiController');
});
