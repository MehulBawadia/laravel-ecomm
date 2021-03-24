<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display the products listed in the given tag.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('pages.tags.show');
    }
}
