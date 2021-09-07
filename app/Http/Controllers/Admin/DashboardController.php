<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Logout the administrator.
     *
     * @return \Illuuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        return redirect(route('homePage'));
    }
}
