<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        // Using class based composers...
//        View::composer(
//            '*', 'App\Http\ViewComposers\GlobalTemplateComposer'
//        );
        View::composer(
            'layouts.app', 'App\Http\ViewComposers\TemplateComposer'
        );

        // Using Closure based composers...
//        View::composer('dashboard', function ($view) {
//            //
//        });
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
