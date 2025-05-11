<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('admin')->check()) {
            if (auth()->check()) {
                // Jika pengguna biasa sudah login tapi mencoba akses admin
                return redirect()->route('beranda')->with('error', 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman admin.');
            }

            // Jika belum login sama sekali, arahkan ke login admin
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
