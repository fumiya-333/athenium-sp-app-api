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
            return response()->json(
                [
                    AppConstants::KEY_SUCCESS => true,
                    AppConstants::KEY_RESPONSE => $response,
                ],
                200
            );
        });

        Response::macro(AppConstants::KEY_ERROR, function ($error, $error_code) {
            return response()->json(
                [
                    AppConstants::KEY_SUCCESS => false,
                    AppConstants::KEY_RESPONSE => $error,
                ],
                $error_code
            );
        });
    }
}
