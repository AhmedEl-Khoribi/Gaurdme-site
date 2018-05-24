<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        //To view archives variable and call archives method on every load anywhere in my site
        view()->composer('layouts.navbar', function($view){
                $view->with('archives', \App\Task::archives());
        });

        view()->composer('layouts.navbar', function($view){
                $view->with('tasks', \App\Task::tasks());
        });
        view()->composer('layouts.navbar', function($view){
                $view->with('tags', \App\Tag::has('tasks')->pluck('name'));
        });
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
