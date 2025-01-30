<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'permission' => \App\Http\Middleware\CheckPermission::class,
            'logoutIfNotAuthenticated' => \App\Http\Middleware\LogoutIfNotAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        // // // This code block handles all the exceptions thrown by the application
        // $exceptions->renderable(function (Exception $e, Request $request) {
        //     if ($request->is('api/*')) {
        //         // Please search for the error message in the log file stored in the storage/logs directory
        //         Log::error($e->getMessage());
        //         return response()->json([
        //             'message' => 'Sorry, We were unable to process the request at this moment. Please try again later.'
        //         ], 404);
        //     }else if($request->is('*')){
        //         return response()->view('errors.404', [], 404);
        //     }
            
        // });
        // // // This code block handles all the errors thrown by the application
        // $exceptions->renderable(function (Throwable $e, Request $request) {
        //     if ($request->is('api/*')) {
        //         // Please search for the error message in the log file stored in the storage/logs directory
        //         Log::error($e->getMessage());
        //         return response()->json([
        //             'message' => 'Sorry, We were unable to process the request at this moment. Please try again later.'
        //         ], 500);
        //     }
        // });
    })->create();
