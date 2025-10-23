<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  Role yang dibutuhkan (admin/customer)
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        // Pastikan user sudah login
        $user = Auth::user();

        // Jika belum login → unauthorized
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthenticated. Please log in first.'
            ], 401);
        }

        // Jika role tidak sesuai → forbidden
        if ($user->role !== $role) {
            return response()->json([
                'status' => 'error',
                'message' => 'Access denied. You do not have the required role.'
            ], 403);
        }

        // Jika semua lolos → lanjut ke request berikutnya
        return $next($request);
    }
}
