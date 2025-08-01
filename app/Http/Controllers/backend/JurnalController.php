<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Jurnal_Mengajar;
use App\Models\Guru;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class JurnalController extends Controller
{

    public function index()
    {
        $user = Auth::guard('guru')->user() ?? Auth::guard('admin')->user();

        // Kalau masih null, abort (belum login)
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        if ($user->status === 'Guru') {
            // hanya ambil jurnal milik guru ini
            $data = Jurnal_Mengajar::where('id_guru', $user->id)->get();
        } else {
            // admin bisa lihat semua data
            $data = Jurnal_Mengajar::all();
        }

        return view('jurnal_mengajar.jurnal_mengajar', compact('data'));
    }


    public function create()
    {
        return view('jurnal_mengajar.tambah');
    }


    public function store(Request $request)
    {
      $request->validate([
        'jam_ke'=>'required',
        'kelas'=>'required',
        'kompetensi_dasar'=>'required',
        'kegiatan_belajar'=>'required',
        'absen_sakit'=>'required',
        'absen_izin'=>'required',
        'absen_alpha'=>'required',
        'keterangan'=>'required',
      ]);

      Jurnal_Mengajar::create([
        'id_guru' => auth('guru')->user()->id,
        'jam_ke'=>$request->jam_ke,
        'kelas'=>$request->kelas,
        'kompetensi_dasar'=>$request->kompetensi_dasar,
        'kegiatan_belajar'=>$request->kegiatan_belajar,
        'absen_sakit'=>$request->absen_sakit,
        'absen_izin'=>$request->absen_izin,
        'absen_alpha'=>$request->absen_alpha,
        'keterangan'=>$request->keterangan
      ]);

    return redirect()->route('jurnal')->with('success', 'jurnal berhasil ditambahkan');
    }


    public function edit($id)
    {
        $data = Jurnal_Mengajar::findOrFail($id);
        return view('jurnal_mengajar.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'jam_ke'=>'required',
            'kelas'=>'required',
            'kompetensi_dasar'=>'required',
            'kegiatan_belajar'=>'required',
            'absen_sakit'=>'required',
            'absen_izin'=>'required',
            'absen_alpha'=>'required',
            'keterangan'=>'required',
          ]);

          $data = Jurnal_Mengajar::findOrFail($id);

          $data->update([
            'id_guru' => auth('guru')->user()->id,
            'jam_ke'=>$request->jam_ke,
            'kelas'=>$request->kelas,
            'kompetensi_dasar'=>$request->kompetensi_dasar,
            'kegiatan_belajar'=>$request->kegiatan_belajar,
            'absen_sakit'=>$request->absen_sakit,
            'absen_izin'=>$request->absen_izin,
            'absen_alpha'=>$request->absen_alpha,
            'keterangan'=>$request->keterangan
          ]);
        return redirect()->route('jurnal')->with('success', 'jurnal berhasil diperbarui');
    }


    public function showPdf(Request $request)
    {
        $user = Auth::guard('guru')->user() ?? Auth::guard('admin')->user();
    
        $nip = '..........................';
        $namaUser = $user->nama ?? 'Tidak diketahui';
    
        if ($user->status === 'Guru') {
            $guru = Guru::where('id', $user->id)->first();
            $data = Jurnal_Mengajar::with('guru')
                ->where('id_guru', $guru->id)
                ->get();
        } else {
            $guru = null;
            $data = Jurnal_Mengajar::with('guru')->get();
        }
    
        $kepala_sekolah = Guru::where('status', 'Kepala Sekolah')->first();
    
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
    
        if ($bulan >= 7) {
            $semester = 'SEMESTER GANJIL';
            $tahun_awal = $tahun;
            $tahun_akhir = $tahun + 1;
        } else {
            $semester = 'SEMESTER GENAP';
            $tahun_awal = $tahun - 1;
            $tahun_akhir = $tahun;
        }
    
        if (auth('admin')->check()) {
            $nip = auth('admin')->user()->nip ?? $nip;
        } elseif (auth('guru')->check()) {
            $nip = auth('guru')->user()->nip ?? $nip;
        }
    
        // Kirim semua data ke view Blade (tidak membuat PDF)
        return view('jurnal_mengajar.show_laporan', compact(
            'data',
            'guru',
            'kepala_sekolah',
            'semester',
            'tahun_awal',
            'tahun_akhir',
            'namaUser',
            'nip'
        ));
    }
    

        
    public function exportPdf()
    {
        $user = Auth::guard('guru')->user() ?? Auth::guard('admin')->user();

        $nip = '..........................';
        $namaUser = $user->nama ?? 'Tidak diketahui';

        if ($user->status === 'Guru') {
            // Ambil data guru login
            $guru = Guru::where('id', $user->id)->first();

            // Ambil jurnal milik guru
            $data = Jurnal_Mengajar::with('guru')
                ->where('id_guru', $guru->id)
                ->get();
        } else {
            $guru = null;
            $data = Jurnal_Mengajar::with('guru')->get();
        }

        // Ambil data kepala sekolah
        $kepala_sekolah = Guru::where('status', 'Kepala Sekolah')->first();

        // Hitung semester & tahun ajaran dinamis
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;

        if ($bulan >= 7) {
            $semester = 'SEMESTER GANJIL';
            $tahun_awal = $tahun;
            $tahun_akhir = $tahun + 1;
        } else {
            $semester = 'SEMESTER GENAP';
            $tahun_awal = $tahun - 1;
            $tahun_akhir = $tahun;
        }

        // Tentukan NIP (namaUser sudah di-set di awal)
        if (auth('admin')->check()) {
            $nip = auth('admin')->user()->nip ?? $nip;
        } elseif (auth('guru')->check()) {
            $nip = auth('guru')->user()->nip ?? $nip;
        }

        // Kirim semua data ke view
        $pdf = Pdf::loadView('jurnal_mengajar.pdf', compact(
            'data',
            'guru',
            'kepala_sekolah',
            'semester',
            'tahun_awal',
            'tahun_akhir',
            'namaUser',
            'nip'
        ))->setPaper('a4', 'landscape');

        $filename = ($user->status === 'Guru')
            ? 'jurnal-' . $user->name . '.pdf'
            : 'laporan-jurnal-mengajar.pdf';

        return $pdf->download($filename);
    }
}