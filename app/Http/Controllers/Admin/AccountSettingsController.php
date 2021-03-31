<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AccountSettingsController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.account-settings.index');
    }
}
