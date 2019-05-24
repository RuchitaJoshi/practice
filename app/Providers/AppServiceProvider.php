<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //write * at place of threads.create to make it applicable to every single available views
        //Or you can use 'share' as shown below
        
//        View::share('channels', \App\Channel::all());

        View::composer('threads.create', function ($view){
            $view->with('channels', \App\Channel::all());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment() == 'local'){
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
