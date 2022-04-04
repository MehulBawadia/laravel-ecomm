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
        View::composer('*', function ($view) {
            $contactInfo = json_decode(SiteSetting::first()->contact_info, true);

            $view->with('support_email', $contactInfo['support_email']);
            $view->with('support_contact_number', $contactInfo['contact_number']);
        });
    }
}
