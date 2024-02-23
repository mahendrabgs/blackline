<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next): mixed
    {
        $authStatus = $this->validateAuthKey($request);

        if ($authStatus['error']) {
            return $this->getErrorResponse($authStatus['msg']);
        }

        return $next($request);
    }

    public function validateAuthKey(Request $request): array
    {
        $headers = $request->header();

        if (!isset($headers['api-auth-key'])) {
            return ['error' => true, 'msg' => 'The api-auth-key is missed in the header'];
        }

        $apiAuthKey = $headers['api-auth-key'][0] ?? '';

        if (empty($apiAuthKey)) {
            return ['error' => true, 'msg' => 'The api-auth-key is empty'];
        }

        if (($apiAuthKey != config('constants.API-AUTH-KEY'))) {
            return ['error' => true, 'msg' => 'The api-auth-key is not valid'];
        }
        return ['error' => false];
    }

    public function getErrorResponse(string $errorMsg): \Illuminate\Http\JsonResponse
    {
        return response()->json(['error' => 'Unauthorized', 'msg' => $errorMsg],  Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json']);
    }
}
