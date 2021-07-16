<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display all the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Display edit form of the given category id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.categories.edit');
    }
}
