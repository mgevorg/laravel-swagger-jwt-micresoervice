<?php

namespace Services\User\PostService\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Services\User\PostService\Contracts\PostServiceInterface;
use Services\User\PostService\ServiceCore\PostService;

class PostServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind('services.user.post-service', PostServiceInterface::class);
    }
}
