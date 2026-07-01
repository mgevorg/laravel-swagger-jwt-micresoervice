<?php

return [
    App\Providers\AppServiceProvider::class,
    Services\User\AuthService\Providers\AuthServiceProvider::class,
    Services\User\AuthService\Providers\RouteServiceProvider::class,
    Services\User\PostService\Providers\PostServiceProvider::class,
    Services\User\PostService\Providers\RouteServiceProvider::class,
];
