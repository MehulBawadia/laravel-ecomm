<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display the product's details of the given product slug.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        return view('pages.products.show');
    }
}
