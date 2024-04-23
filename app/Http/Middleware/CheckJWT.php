<?php

// app/Http/Middleware/CheckJWT.php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckJWT
{
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
