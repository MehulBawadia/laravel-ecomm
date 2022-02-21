<?php

namespace App\Http\Controllers\Users;

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
        return view('users.dashboard');
    }

    /**
     * Logout the user.
     *
     * @return \Illuuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth()->logout();

        return redirect(route('homePage'));
    }
}
