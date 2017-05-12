<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;
use App\Models\Book;
use App\Observers\BookObserver;
use Illuminate\Support\Facades\Validator;

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
        Book::observe(BookObserver::class);
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
