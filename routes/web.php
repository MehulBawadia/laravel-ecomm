<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('homePage');
Route::namespace('Pages')->group(function () {
    Route::get('/category/{name}', 'CategoriesController@show')->name('categories.show');

    Route::get('/tag/{name}', 'TagsController@show')->name('tags.show');

    Route::get('/product/{name}', 'ProductsController@show')->name('products.show');

    Route::get('/cart', 'CartController@index')->name('cart.index');
});
