<?php

namespace App\Providers;

use App\Service\NengaImageService;
use Illuminate\Support\ServiceProvider;

class NengaImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(NengaImageService::class, function() {
            return new NengaImageService;
        });
    }
}
