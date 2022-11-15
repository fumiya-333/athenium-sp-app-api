<?php

namespace App\Http\Middleware;

use Illuminate\Validation\ValidationException;

use App\Libs\AppConstants;

use Closure;

class ApiMiddleware
{
    /** 400エラー */
    const BAD_REQUEST = 'bad_request';
    /** 401エラー */
    const UNAUTHRIZED = 'unauthorized';
    /** 403エラー */
    const FORBIDDEN = 'forbidden';
    /** 404エラー */
    const NOT_FOUND = 'not_found';
    /** 405エラー */
    const METHOD_NOT_ALLOWED = 'method_not_allowed';
    /** 422エラー */
    const VALIDATION_ERROR = 'validation_error';
    /** 500エラー */
    const INTERNAL_SERVER_ERROR = 'internal_server_error';

    /** エラーコード一覧 */
    const ERROR_CODES = [
        self::BAD_REQUEST => 400,
        self::UNAUTHRIZED => 401,
        self::FORBIDDEN => 403,
        self::NOT_FOUND => 404,
        self::METHOD_NOT_ALLOWED => 405,
        self::VALIDATION_ERROR => 422,
        self::INTERNAL_SERVER_ERROR => 500,
    ];

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $exception = $response->exception;
        if (!empty($exception)) {
            if ($exception instanceof ValidationException) {
                if ($exception->getMessage() === __('messages.conduct', ['attribute' => __('messages.relogin')])) {
                    return response()->error([$exception->getMessage()], self::ERROR_CODES[self::UNAUTHRIZED]);
                }
                return response()->error([$exception->getMessage()], self::ERROR_CODES[self::VALIDATION_ERROR]);
            }
            return response()->error(
                [AppConstants::KEY_LOG => $exception->getMessage()],
                self::ERROR_CODES[self::NOT_FOUND]
            );
        }

        return $response;
    }
}
