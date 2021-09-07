<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/generate', 'Admin\GenerateController@index')->name('admin.generate');
Route::post('/admin/generate', 'Admin\GenerateController@store')->name('admin.generate.store');

Route::middleware('guest')->namespace('Admin')->name('admin')->prefix('admin')->group(function () {
    Route::get('/login', 'LoginController@index')->name('.login');
    Route::post('/login', 'LoginController@check')->name('.login.check');
});

Route::get('/home', 'HomeController@redirectToDashboard')->name('home');

Route::middleware('adminLoggedIn')->namespace('Admin')->name('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('.dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('.logout');

    Route::get('/account-settings', 'AccountSettingsController@index')->name('.accountSettings');

    Route::name('.categories')->prefix('categories')->group(function () {
        Route::get('/', 'CategoriesController@index');
        Route::get('/{id}/edit', 'CategoriesController@edit')->name('.edit');
    });

    Route::name('.tags')->prefix('tags')->group(function () {
        Route::get('/', 'TagsController@index');
        Route::get('/{id}/edit', 'TagsController@edit')->name('.edit');
    });

    Route::name('.coupons')->prefix('coupons')->group(function () {
        Route::get('/', 'CouponsController@index');
        Route::get('/{id}/edit', 'CouponsController@edit')->name('.edit');
    });

    Route::name('.products')->prefix('products')->group(function () {
        Route::get('/', 'ProductsController@index');
        Route::get('/{id}/edit', 'ProductsController@edit')->name('.edit');
    });

    Route::name('.orders')->prefix('orders')->group(function () {
        Route::get('/', 'OrdersController@index');
        Route::get('/{id}/show', 'OrdersController@show')->name('.show');
    });

    Route::name('.users')->prefix('users')->group(function () {
        Route::get('/', 'UsersController@index');
        Route::get('/{id}/edit', 'UsersController@edit')->name('.edit');
    });

    Route::name('.siteSettingsGeneral')->prefix('site-settings-general')->group(function () {
        Route::get('/', 'SiteSettingsGeneralController@index');
    });
});

Route::middleware('adminExists')->group(function () {
    Route::get('/', 'HomeController@index')->name('homePage');
    Route::get('/contact', 'StaticPagesController@contact')->name('pages.contact');

    Route::namespace('Pages')->group(function () {
        Route::get('/category/{name}', 'CategoriesController@show')->name('categories.show');

        Route::get('/tag/{name}', 'TagsController@show')->name('tags.show');

        Route::get('/product/{name}', 'ProductsController@show')->name('products.show');

        Route::get('/cart', 'CartController@index')->name('cart.index');

        Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

        Route::get('/order-placed/thank-you', 'OrderPlacedController@success')->name('orderPlaced.success');
    });
});
