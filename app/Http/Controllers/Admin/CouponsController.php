<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CouponsController extends Controller
{
    /**
     * Display all the coupons.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.coupons.index');
    }

    /**
     * Display edit form of the given coupon id.
     *
     * @params  integer $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.coupons.edit');
    }
}
