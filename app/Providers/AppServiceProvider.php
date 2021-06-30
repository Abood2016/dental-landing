<?php

namespace App\Providers;

use App\Models\opening;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
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
        view()->share('setting', Setting::orderBy('created_at', 'desc')->limit(1)->get()->first());
        view()->share('hoursDaily', opening::orderBy('created_at', 'desc')->limit(1)->get()->first());
        view()->share('testimonial', Testimonial::orderBy('created_at', 'desc')->limit(1)->get()->first());
        view()->share('services', Service::orderBy('created_at', 'desc')->get());
    }
}
