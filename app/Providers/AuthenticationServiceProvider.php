<?php

namespace App\Providers;

use App\Repositories\AuthenticationRepository;
use App\Interfaces\AuthenticationInterface;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationInterface::class, AuthenticationRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
