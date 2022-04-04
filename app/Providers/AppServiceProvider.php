<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $contactInfo = json_decode(SiteSetting::first()->contact_info, true);

        View::share('support_email', $contactInfo['support_email']);
        View::share('support_contact_number', $contactInfo['contact_number']);
    }
}
