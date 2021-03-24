<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display the cart page.
     *
     * @return \Facade\FlareClient\View
     */
    public function index()
    {
        return view('cart.index');
    }
}
