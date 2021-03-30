<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class OrderPlacedController extends Controller
{
    /**
     * Disiplay the thank you message for placing the order.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        return view('orders-placed.success');
    }
}
