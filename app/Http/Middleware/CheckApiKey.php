<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (isset(getallheaders()['API_KEY']) && getallheaders()['API_KEY'] == config('app.api_key')) {
            return $next($request);
        } else {
            return response()->json([
                'status' => false,
                'error' => "Invalid request"
            ], 503);
        }
    }
}
