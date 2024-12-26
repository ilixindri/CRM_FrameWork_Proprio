<?php

namespace App\Http;

use App\Route;
use Response;

class Kernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
        ],

        'api' => [
        ],
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
    ];

    public function __construct()
    {
        
    }

    public function handle($request)
    {
        $response = Route::dispatch($request->uri(), $request->method());
        return new Response($request);
    }

    public function terminate($request, $response)
    {

    }

    public
}
