<?php

namespace Services\User\AuthService\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Services\User\AuthService\Contracts\AuthServiceInterface;
use Services\User\AuthService\ServiceCore\AuthService;

class AuthServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind('services.user.auth-service', AuthServiceInterface::class);
    }
}
