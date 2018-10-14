<?php

namespace DepakesPedro\LaravelAuthUrl\Providers;

use Illuminate\Support\ServiceProvider;

class AuthUrlProvider extends ServiceProvider
{
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__ . '/../database/migrations/auth_url_create_table_auth_url_users.php' => $this->app->databasePath() . "/migrations/{$timestamp}_create_table_auth_url_users.php",
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/auth_url.php' => config_path('auth_url.php'),
        ], 'config');
    }

    public function register()
    {

    }
}