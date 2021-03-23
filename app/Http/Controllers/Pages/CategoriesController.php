<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display all the products that are mapped to the given category.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        return view('pages.categories.show');
    }
}
