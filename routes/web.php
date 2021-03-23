<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('homePage');
Route::namespace('Pages')->group(function () {
    Route::get('/category/{name}', 'CategoriesController@show')->name('categories.show');
});
