<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display all the orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.orders.index');
    }

    /**
     * Display order details of the given id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('admin.orders.show');
    }
}
