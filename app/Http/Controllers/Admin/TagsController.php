<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display all the tags.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.tags.index');
    }

    /**
     * Display edit form of the given tag id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.tags.edit');
    }
}
