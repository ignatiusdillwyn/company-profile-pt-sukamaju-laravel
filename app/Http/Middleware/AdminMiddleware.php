<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

// Middleware ini didaftarkan dengan alias 'admin' di bootstrap/app.php
// Tugasnya: memastikan hanya user yang SUDAH LOGIN yang boleh masuk
// ke halaman-halaman di dalam Route::middleware('admin')->group(...)
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login, tendang balik ke halaman login admin
        if (! Auth::check()) {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman admin.');
        }

        // Jika sudah login, lanjutkan request ke controller tujuan
        return $next($request);
    }
}
