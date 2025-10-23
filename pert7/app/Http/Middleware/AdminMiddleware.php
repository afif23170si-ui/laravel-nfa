<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Simulasi admin pakai header token sederhana
        $isAdmin = $request->header('X-ADMIN-TOKEN') === 'secret123';

        if (!$isAdmin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized. Only admin can perform this action.'
            ], 403);
        }

        return $next($request);
    }
}
