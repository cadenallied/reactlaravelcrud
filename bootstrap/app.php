<?php

// bootstrap/app.php
// In Laravel 12, this file is responsible for bootstrapping the application and configuring routing, middleware, and exception handling.
// Unlike previous versions, you must manually specify your route files (web.php, api.php, etc.) here.
// This allows for more explicit and flexible application setup.

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    // Explicitly register route files for web, api, and console routes
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up', // Health check endpoint
    )
    // Register global middleware here if needed
    ->withMiddleware(function (Middleware $middleware) {
        // ...
    })
    // Register exception handling configuration here if needed
    ->withExceptions(function (Exceptions $exceptions) {
        // ...
    })->create();
