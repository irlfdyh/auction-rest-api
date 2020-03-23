<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class APITokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $apiToken = $request->token;
        $apiTokenOwner = User::where('api_token', $apiToken)->first();
        if ($apiToken && $apiTokenOwner) {
            return $next($request);
        } else {
            return response()->json([
                'message' => 'Unauthorization'
            ], 401);
        }
    }

}
