<?php

namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Throwable;
use Sentry\Laravel\Integration;

class Handler extends ExceptionHandler{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function(){
            return response()->json([
                'status'=>'error',
                'errors'=>['generic'=>'not authantication']
            ], JsonResponse::HTTP_UNAUTHORIZED);
        });

        $this->reportable(function (Throwable $e) {
                // if('APP_ENV'==='production'){
                //     if(app()->bound('sentry')){
                //         app('sentry')->captureException($e);
                //     }
                // }
                // if('APP_ENV'==='local'){
                //     Log::error($e);
                // }
                return response()->json([
                    'status'=>'error',
                    'errors'=>['generic'=>'unknown']
                ], JsonResponse::HTTP_BAD_REQUEST);
        });
    }
}
