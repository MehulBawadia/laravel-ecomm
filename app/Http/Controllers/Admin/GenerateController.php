<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class GenerateController extends Controller
{
    /**
     * Display the generate administrator form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.generate');
    }
}
