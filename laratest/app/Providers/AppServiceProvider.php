<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.nav', function($view)
        {
            if(Auth::check())
            {
                $view->with(['user'=>Auth::user()->name, 'log'=>true]);
            }
            else
            {
                $view->with(['user'=>'blank', 'log'=>false]);
            }
        });

        view()->composer('articles.show', function($view)
        {
            if(Auth::check())
            {
                $view->with(['user'=>Auth::user()->id, 'log'=>true]);
            }
            else
            {
                $view->with(['user'=>'', 'log'=>false]);
            }
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
