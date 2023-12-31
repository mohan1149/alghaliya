<?php

namespace Knox\Pesapal;

use Illuminate\Support\ServiceProvider;

class PesapalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config
        $configPath = __DIR__ . '/config/pesapal.php';
        $this->publishes([$configPath => config_path('pesapal.php')], 'pesapal');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/routes.php';

        $this->app->singleton('pesapal',function () {
            return new Pesapal;
        });
    }
}
