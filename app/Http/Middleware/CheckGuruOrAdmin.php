<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuruOrAdmin
{
    public function handle($request, Closure $next)
{

    if (Auth::guard('admin')->check()) {
        $disallowedRoutes = [
            'persensi.tambah',
            'jurnal.tambah',
            'jurnal.edit'
        ];

        $routeName = optional($request->route())->getName();

        if (in_array($routeName, $disallowedRoutes)) {
            abort(403, 'Admin tidak diizinkan mengakses halaman ini.');
        }

        return $next($request);

    }

    if (Auth::guard('guru')->check()) {
        $user = Auth::guard('guru')->user();

        if (strtolower($user->status) === 'kepala sekolah') {
            $allowedRoutes = [
                'dashboard',
                'persensi',
                'persensi.filterLaporan',
                'persensi.showLaporan',
                'jurnal',
                'jurnal.preview',
                'persensi.filter'
                // 'export.jurnal'
            ];

   $routeName = optional($request->route())->getName();

            if (in_array($routeName, $allowedRoutes)) {
                return $next($request);
            } else {
                abort(403, 'Akses ditolak untuk Kepala Sekolah.');
            }
        }

        // Guru biasa
        return $next($request);
    }

    abort(403, 'Akses ditolak.');
}

}
