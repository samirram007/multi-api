<?php

use App\Helpers\ApiErrorResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->use([
            App\Http\Middleware\NormalizeRequestKeys::class,
            App\Http\Middleware\NormalizeQueryParameters::class,
            Illuminate\Http\Middleware\HandleCors::class
        ]);
        $middleware->alias([
            'jwt.cookies' => App\Http\Middleware\JWTFromCookie::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {


        $exceptions->render(function (AuthenticationException $e) {
            if (request()->is('api/*')) {
                return ApiErrorResponse::respond(
                    'Unauthenticated.',
                    401,
                    null,
                    'AUTH_401'
                );
            }
        });

        $exceptions->render(function (AuthorizationException $e) {
            if (request()->is('api/*')) {
                return ApiErrorResponse::respond(
                    'This action is unauthorized.',
                    403,
                    null,
                    'AUTH_403'
                );
            }
        });
        $exceptions->render(function (ModelNotFoundException $e, $request) {
            if ($request->is('api/*')) {
                return ApiErrorResponse::respond(
                    'Resource not found.',
                    404,
                    null,
                    'RESOURCE_NOT_FOUND'
                );
            }
        });
        $exceptions->render(function (NotFoundHttpException $e, $request) {

            if ($request->is('api/*')) {
                $previous = $e->getPrevious();

                if ($previous instanceof ModelNotFoundException) {
                    return ApiErrorResponse::respond(
                        'Resource not found.',
                        404,
                        config('app.debug') ? ['debug' => $e->getMessage()] : null,
                        'RESOURCE_NOT_FOUND'
                    );
                }

                return ApiErrorResponse::respond(
                    'URL not found.',
                    404,
                    null,
                    'ROUTE_NOT_FOUND'
                );
            }
        });

        $exceptions->render(function (ValidationException $e) {
            if (request()->is('api/*')) {
                $errors = collect($e->errors())->mapWithKeys(function ($messages, $key) {
                    // Flatten key: take only the last segment
                    $flatKey = last(explode('.', $key));

                    // Clean messages: remove any prefix like 'address.' or 'billing.'
                    $cleanMessages = array_map(function ($msg) use ($key) {
                        // Remove everything before the field name (last segment)
                        $fieldName = last(explode('.', $key));
                        return preg_replace('/.*' . preg_quote($fieldName, '/') . '/', $fieldName, $msg);
                    }, $messages);

                    return [$flatKey => $cleanMessages];
                })->toArray();



                return ApiErrorResponse::respond(
                    'Validation failed.',
                    422,
                    $errors,
                    'VALIDATION_ERROR'
                );
            }
        });

        $exceptions->render(function (InvalidArgumentException $e, $request) {
            //dd($request->all());
            if ($request->is('api/*')) {
                return ApiErrorResponse::respond(
                    'Invalid parameter.',
                    400,
                    config('app.debug') ? ['debug' => $e->getMessage()] : null,
                    'INVALID_PARAMETER'
                );
            }
        });


        $exceptions->render(function (Throwable $e) {
            if (request()->is('api/*')) {
                // dd($e);
                $statusCode = (is_int($e->getCode()) && $e->getCode() >= 100 && $e->getCode() < 600)
                    ? $e->getCode()
                    : 500;
                return ApiErrorResponse::respond(
                    $e->getMessage() ?? 'Internal server error.',
                    $statusCode,
                    config('app.debug') ? ['debug' => $e->getMessage()] : null,
                    'INTERNAL_ERROR'
                );
            }
        });
    })->create();
