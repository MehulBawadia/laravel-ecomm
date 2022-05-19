<?php

namespace App\Providers;

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
        $setting = json_decode(optional(cache('siteSettingsContact'))->contact_info, true) ?? [];
        view()->share('support_email', $setting['support_email'] ?? '--');
        view()->share('support_contact_number', $setting['contact_number'] ?? '--');
    }
}
