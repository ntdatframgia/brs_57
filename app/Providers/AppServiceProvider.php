<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('showErrField', 'components.form.error_field', ['name', 'value', 'attributes']);
        Form::component('showErrClass', 'components.form.error_class', ['name', 'value', 'attributes']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
