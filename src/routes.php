<?php

Route::group([
    'middleware' => ['web'],
    'as' => 'customer::',
    'prefix' => 'customer',
    'namespace' => 'WTG\Customer\Controllers'
], function () {
    Route::group([
        'as' => 'auth.',
        'prefix' => 'auth',
        'namespace' => 'Auth'
    ], function () {
        Route::post('login', 'LoginController@login')->name('login');
    });

    Route::group([
        'as' => 'account.',
        'prefix' => 'account',
        'namespace' => 'Account',
        'middleware' => ['auth']
    ], function () {
        Route::get('/', 'DashboardController@view')->name('dashboard');

        Route::group([
            'prefix' => 'accounts',
            'as' => 'accounts::'
        ], function () {
            Route::get('/', 'SubAccountController@view')->name('view');

            Route::post('/', 'SubAccountController@store');
            Route::post('update/{id}', 'SubAccountController@update')->name('update');
            Route::post('remove', 'SubAccountController@destroy')->name('delete');
        });

        Route::group([
            'prefix' => 'password',
            'as' => 'password::'
        ], function () {
            Route::get('/', 'PasswordController@view')->name('view');

            Route::post('/', 'PasswordController@doChangePassword')->name('update');
        });

        Route::group([
            'prefix' => 'favorites',
            'as' => 'favorites::'
        ], function () {
            Route::get('/', 'FavoritesController@view')->name('view');

            Route::post('check', 'FavoritesController@check')->name('check');
            Route::post('add', 'FavoritesController@add')->name('add');
            Route::post('delete', 'FavoritesController@delete')->name('delete');
        });

        Route::group([
            'prefix' => 'history',
            'as' => 'history::'
        ], function () {
            Route::get('/', 'OrderHistoryController@view')->name('view');

            Route::get('{order}', 'OrderHistoryController@addOrderToCart')->name('reorder');
        });

        Route::group([
            'prefix' => 'addresses',
            'as' => 'addresses::'
        ], function () {
            Route::get('/', 'AddressController@view')->name('view');

            Route::post('add', 'AddressController@add')->name('add');
            Route::post('delete/{id}', 'AddressController@delete')->name('delete');
        });

        Route::group([
            'prefix' => 'discountfile',
            'as' => 'discountfile::'
        ], function () {
            Route::get('/', 'DiscountfileController@view')->name('view');
            Route::get('generate/{type}/{method}', 'DiscountfileController@generate')->name('generate');
        });
    });
});