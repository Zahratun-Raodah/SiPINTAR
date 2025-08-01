<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Jurnal_Mengajar;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function read(){
        $rekapBulanIni = DB::table('absensi')
                        ->selectRaw('
                            SUM(CASE WHEN status = "Hadir" THEN 1 ELSE 0 END) as total_hadir,
                            SUM(CASE WHEN status = "Sakit" THEN 1 ELSE 0 END) as total_sakit,
                            SUM(CASE WHEN status = "Izin" THEN 1 ELSE 0 END) as total_izin,
                            SUM(CASE WHEN status = "Alpha" THEN 1 ELSE 0 END) as total_alpa
                        ')
                        ->whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year)
                        ->first();

        $data = Jurnal_Mengajar::with('guru')->get();
        return view('dashboard.index', compact('data', 'rekapBulanIni'));
    }
}



