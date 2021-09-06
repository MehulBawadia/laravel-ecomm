<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SiteSettingsGeneralController extends Controller
{
    /**
     * Display the general site settings field.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.site-settings.general');
    }
}
