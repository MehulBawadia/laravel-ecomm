<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/generate', 'Admin\GenerateController@index')->name('admin.generate');
Route::post('/admin/generate', 'Admin\GenerateController@store')->name('admin.generate.store');

Route::middleware(['adminExists', 'guest'])->namespace('Admin')->name('admin')->prefix('admin')->group(function () {
    Route::get('/login', 'LoginController@index')->name('.login');
    Route::post('/login', 'LoginController@check')->name('.login.check');
});

Route::get('/home', 'HomeController@redirectToDashboard')->name('home');

Route::middleware('adminLoggedIn')->namespace('Admin')->name('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('.dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('.logout');

    Route::get('/account-settings', 'AccountSettingsController@index')->name('.accountSettings');
    Route::patch('/account-settings/general', 'AccountSettingsController@updateGeneral')->name('.accountSettings.general');
    Route::delete('/account-settings/delete-avatar', 'AccountSettingsController@deleteAvatar')->name('.accountSettings.deleteAvatar');
    Route::patch('/account-settings/change-password', 'AccountSettingsController@changePassword')->name('.accountSettings.changePassword');

    Route::name('.categories')->prefix('categories')->group(function () {
        Route::get('/', 'CategoriesController@index');
        Route::post('/', 'CategoriesController@store')->name('.store');
        Route::get('/{id}/edit', 'CategoriesController@edit')->name('.edit');
        Route::patch('/{id}', 'CategoriesController@update')->name('.update');
        Route::patch('/{id}/seo', 'CategoriesController@updateSeo')->name('.updateSeo');
        Route::delete('/{id}/delete', 'CategoriesController@delete')->name('.delete');
        Route::patch('/{id}/restore', 'CategoriesController@restore')->name('.restore');
        Route::delete('/{id}/destroy', 'CategoriesController@destroy')->name('.destroy');
    });

    Route::name('.tags')->prefix('tags')->group(function () {
        Route::get('/', 'TagsController@index');
        Route::post('/', 'TagsController@store')->name('.store');
        Route::get('/{id}/edit', 'TagsController@edit')->name('.edit');
        Route::patch('/{id}', 'TagsController@update')->name('.update');
        Route::patch('/{id}/seo', 'TagsController@updateSeo')->name('.updateSeo');
        Route::delete('/{id}/delete', 'TagsController@delete')->name('.delete');
        Route::patch('/{id}/restore', 'TagsController@restore')->name('.restore');
        Route::delete('/{id}/destroy', 'TagsController@destroy')->name('.destroy');
    });

    Route::name('.brands')->prefix('brands')->group(function () {
        Route::get('/', 'BrandsController@index');
        Route::post('/', 'BrandsController@store')->name('.store');
        Route::get('/{id}/edit', 'BrandsController@edit')->name('.edit');
        Route::patch('/{id}', 'BrandsController@update')->name('.update');
        Route::patch('/{id}/seo', 'BrandsController@updateSeo')->name('.updateSeo');
        Route::delete('/{id}/delete', 'BrandsController@delete')->name('.delete');
        Route::patch('/{id}/restore', 'BrandsController@restore')->name('.restore');
        Route::delete('/{id}/destroy', 'BrandsController@destroy')->name('.destroy');
    });

    Route::name('.coupons')->prefix('coupons')->group(function () {
        Route::get('/', 'CouponsController@index');
        Route::post('/', 'CouponsController@store')->name('.store');
        Route::get('/{id}/edit', 'CouponsController@edit')->name('.edit');
        Route::patch('/{id}', 'CouponsController@update')->name('.update');
        Route::delete('/{id}/delete', 'CouponsController@delete')->name('.delete');
        Route::patch('/{id}/restore', 'CouponsController@restore')->name('.restore');
        Route::delete('/{id}/destroy', 'CouponsController@destroy')->name('.destroy');
    });

    Route::name('.products')->prefix('products')->group(function () {
        Route::get('/', 'ProductsController@index');
        Route::post('/', 'ProductsController@store')->name('.store');
        Route::get('/{id}/edit', 'ProductsController@edit')->name('.edit');
        Route::patch('/{id}/general', 'ProductsController@updateGeneral')->name('.updateGeneral');
        Route::patch('/{id}/images', 'ProductsController@updateImages')->name('.updateImages');
        Route::patch('/{id}/seo', 'ProductsController@updateSeo')->name('.updateSeo');
        Route::delete('/{id}/delete', 'ProductsController@delete')->name('.delete');
        Route::patch('/{id}/restore', 'ProductsController@restore')->name('.restore');
        Route::delete('/{id}/destroy', 'ProductsController@destroy')->name('.destroy');
    });

    Route::name('.orders')->prefix('orders')->group(function () {
        Route::get('/', 'OrdersController@index');
        Route::get('/{id}/show', 'OrdersController@show')->name('.show');
        Route::delete('/{id}/destroy', 'OrdersController@destroy')->name('.destroy');
    });

    Route::name('.users')->prefix('users')->group(function () {
        Route::get('/', 'UsersController@index');
        Route::post('/create', 'UsersController@store')->name('.store');
        Route::get('/{id}/edit', 'UsersController@edit')->name('.edit');
        Route::patch('/{id}/update-general', 'UsersController@updateGeneral')->name('.updateGeneral');
        Route::patch('/{id}/change-password', 'UsersController@changePassword')->name('.changePassword');
        Route::delete('/{id}/delete', 'UsersController@delete')->name('.delete');
        Route::patch('/{id}/restore', 'UsersController@restore')->name('.restore');
        Route::delete('/{id}/destroy', 'UsersController@destroy')->name('.destroy');
    });

    Route::name('.siteSettingsGeneral')->prefix('site-settings-general')->group(function () {
        Route::get('/', 'SiteSettingsGeneralController@index');
        Route::patch('/address', 'SiteSettingsGeneralController@updateAddressInfo')->name('.updateAddressInfo');
        Route::patch('/contact', 'SiteSettingsGeneralController@updateContactInfo')->name('.updateContactInfo');
        Route::patch('/order-email', 'SiteSettingsGeneralController@updateOrderEmailInfo')->name('.updateOrderEmailInfo');
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
