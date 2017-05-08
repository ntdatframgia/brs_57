<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\Facades\Process\ProcessUpload;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('CustomUpload', ProcessUpload::class);
    }
}
