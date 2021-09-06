<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display all the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Display the form to edit the user details of the given id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.users.edit');
    }
}
