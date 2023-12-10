<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
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

        /*
        * Custom layouts...
        */

        Blade::component('layouts.footer', 'footer');
        Blade::component('layouts.navigation', 'navigation');


        /*
        * HomePage custom components...
        */
        Blade::component('frontpage.components.home-hero', 'home-hero');
        Blade::component('frontpage.components.featured', 'home-featured');
        Blade::component('frontpage.components.about-blocks', 'home-about-blocks');
        Blade::component('frontpage.components.selection', 'home-selection');
        Blade::component('frontpage.components.hire', 'home-hire');
        Blade::component('frontpage.components.testimonials', 'home-testimonials');
        Blade::component('frontpage.components.faq', 'home-faq');
        Blade::component('frontpage.components.newsletter', 'home-newsletter');
    }
}
