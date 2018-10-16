<?php

namespace Depakespedro\LaravelAuthUrl\Providers;

use Depakespedro\LaravelAuthUrl\Contracts\AuthUrlContract;
use Depakespedro\LaravelAuthUrl\Models\AuthUrl;
use Depakespedro\LaravelAuthUrl\Repositories\AuthUrlRepository;
use Illuminate\Support\ServiceProvider;

class AuthUrlServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
                __DIR__ . '/../../database/migrations/auth_url_create_table_auth_url_users.php' =>
                $this->app->databasePath() . "/migrations/{$timestamp}_create_table_auth_url_users.php",
            ],
            'migrations'
        );

        $this->publishes([
                __DIR__ . '/../../config/auth_url.php' => config_path('auth_url.php')
            ],
            'config'
        );

        $this->publishes([
            __DIR__ . '/../../src/Http/Controllers/AuthUrlController.php' => app_path() . config('auth_url.controller_path')
        ],
            'controller'
        );


        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }

    public function register()
    {
        $this->app->instance('Depakespedro\LaravelAuthUrl\Models\User', config('auth_url.models.user'));
        $this->app->bind(AuthUrlContract::class, AuthUrlRepository::class);
    }
}