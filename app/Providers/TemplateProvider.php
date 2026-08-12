<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class TemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
            View::composer('front.layout.template', function ($view) {
            $configKeys = ['logo', 'blogname', 'title', 'caption', 'ads_header', 'ads_footer','footer'];

            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name');

            $view->with('config', $config);
        });
            View::composer('front.contact.index', function ($view) {
            $configKeys = [ 'phone', 'email', 'facebook', 'instagram', 'youtube'];

            $config = Config::whereIn('name', $configKeys)->pluck('value', 'name');

            $view->with('config', $config);
        });
    }
}
