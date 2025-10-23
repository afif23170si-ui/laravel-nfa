<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $isCustomer = $request->header('X-USER-TOKEN') === 'customer123';

        if (!$isCustomer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. Only customer can perform this action.'
            ], 403);
        }

        return $next($request);
    }
}
