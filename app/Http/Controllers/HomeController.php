<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display the home page of the application.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    public function redirectToDashboard()
    {
        return redirect(auth()->user()->getDashboardRoute());
    }
}
