<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->name('admin')->prefix('admin')->group(function () {
    Route::get('/generate', 'GenerateController@index')->name('.generate');

    Route::get('/login', 'LoginController@index')->name('.login');
});

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
