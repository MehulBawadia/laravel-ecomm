<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display all the products.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Display edit form of the given coupon id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.products.edit');
    }
}
