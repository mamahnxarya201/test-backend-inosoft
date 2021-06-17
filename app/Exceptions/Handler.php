<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Response;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->renderable(function (TokenInvalidException $e, Request $request): JsonResponse {
            return Response::json(['error'=>'Invalid Token'], 401);
        });

        $this->renderable(function (TokenExpiredException $e, Request $request): JsonResponse {
            return Response::json(['error'=>'Token has Expired'], 401);
        });

        $this->renderable(function (JWTException $e, Request $request): JsonResponse {
            return Response::json(['error'=>'Token not parsed'], 401);
        });
    }
}
