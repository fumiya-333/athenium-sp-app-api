<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use App\Libs\AppConstants;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * response macro
     *
     * @return void
     */
    public function boot()
    {
        Response::macro(AppConstants::KEY_SUCCESS, function ($response) {
            return response()->json($response, 200);
        });

        Response::macro(AppConstants::KEY_ERROR, function ($error, $error_code) {
            return response()->json($error, $error_code);
        });
    }
}
