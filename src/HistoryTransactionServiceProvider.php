<?php

namespace Eza\HistoryTransaction;

use Illuminate\Support\ServiceProvider;

class HistoryTransactionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTraits();
    }

    /**
     * Register trait file
     *
     * @return void
     * @author Rashid Ali <realrashid05@gmail.com>
     */
    public function registerTraits()
    {
        // Load the helpers in src/functions.php
        if (file_exists($file = __DIR__ . '/HistoryTransaction.php')) {
            require $file;
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

}
