<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Form;
use App\Observers\FollowObserver;
use App\Observers\MarkObserver;
use App\Observers\CommentObserver;
use App\Models\Follow;
use App\Models\Comment;
use App\Models\Mark;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'Mark' => 'App\Models\Mark',
            'Follow' => 'App\Models\Follow',
            'Comment' => 'App\Models\Comment',
        ]);

        Form::component('showErrField', 'components.form.error_field', ['name', 'value', 'attributes']);
        Form::component('showErrClass', 'components.form.error_class', ['name', 'value', 'attributes']);
        Follow::observe(FollowObserver::class);
        Comment::observe(CommentObserver::class);
        Mark::observe(MarkObserver::class);
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
