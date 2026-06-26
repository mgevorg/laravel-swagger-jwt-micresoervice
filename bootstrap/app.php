<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: ['/api/*']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

$app->bind(
    Services\User\AuthService\Contracts\AuthServiceInterface::class,
    Services\User\AuthService\ServiceCore\AuthService::class,
);
$app->bind(
    'services.user.auth-service',
    Services\User\AuthService\Contracts\AuthServiceInterface::class
);
$app->bind(
    Services\User\PostService\Contracts\PostServiceInterface::class,
    Services\User\PostService\ServiceCore\PostService::class,
);
$app->bind(
    'services.user.post-service',
    Services\User\PostService\Contracts\PostServiceInterface::class
);

return $app;
