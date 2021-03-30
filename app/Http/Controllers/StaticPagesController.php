<?php

namespace App\Http\Controllers;

class StaticPagesController extends Controller
{
    /**
     * Display the contact us page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.static.contact');
    }
}
