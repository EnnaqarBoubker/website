<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
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
//        $file = app_path('Helpers/helpers.php');
//        if (file_exists($file)) {
//            require_once($file);
//        }
        require_once app_path() . '/Helpers/helpers.php';
    }
}
