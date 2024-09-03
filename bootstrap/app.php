<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\checkIfAdmin;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
        Route::prefix('admin') // Optional: Use prefix for admin routes if desired
            ->middleware(['web',CheckIfAdmin::class]) // Apply specific middleware
            ->group(base_path('routes/admin.php'));
    },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
     })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
