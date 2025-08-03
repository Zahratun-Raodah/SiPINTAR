<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Siswa;
use App\Models\Mapel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Jobs\KirimPesanWhatsApp;
use Illuminate\Support\Carbon;


class PersensiController extends Controller
{
    public function index()
    {
        $data = Absensi::with('siswa')->get();
        return view('persensi.persensi', compact('data'));
    }

    public function create()
    {
        $data = Siswa::all();
        return view('persensi.tambah' , compact('data'));
    }

    public function store(Request $request)
    {
        $kelas = $request->kelas;

        $request->validate([
            'id_mapel' => 'required|exists:mapel,id'
        ]);

    foreach ($request->absensi as $id_siswa => $status) {
        Absensi::updateOrCreate([
            'id_siswa' => $id_siswa,
            'id_guru' => auth('guru')->id(),
            'id_mapel' => $request->id_mapel,
            'created_at' => now()->toDateString()
        ], [
            'status' => $status,
            'broadcast_terkirim' => false
        ]);
    }

    return redirect()->route('persensi.ShowAbsen', ['kelas' => $kelas, 'id_mapel' => $request->id_mapel])
        ->with('success', 'Absen berhasil disimpan');
    }
    public function ShowAbsen(Request $request)
    {

    // Ambil ID siswa yang diabsen hari ini oleh guru yang login
    $siswaIdHariIni = Absensi::where('id_guru', auth('guru')->id())
        ->whereDate('created_at', Carbon::today())
        ->pluck('id_siswa');

    $kelas = $request->kelas ?? Siswa::whereIn('id', $siswaIdHariIni)->value('kelas');
    $id_mapel = $request->id_mapel;

    if (!$kelas || !$id_mapel) {
        return back()->with('error', 'Kelas dan Mapel harus dipilih.');
    }
    $data = Absensi::whereHas('siswa', function ($q) use ($kelas) {
        $q->where('kelas', $kelas);
    })
        ->where('id_guru', auth('guru')->id())
        ->where('id_mapel', $id_mapel)
        ->whereDate('created_at', Carbon::today())
        ->with('siswa', 'mapel')
        ->get();

        $mapel = $data->first()->mapel ?? null;
        return view('persensi.Absen-kelas', compact('data', 'kelas', 'mapel', 'id_mapel'));
}


public function exportPdf($kelas = null)
{
    $query = Absensi::with(['siswa', 'mapel']);
    if ($kelas) {
        $query->whereHas('siswa', function ($q) use ($kelas) {
            $q->where('kelas', $kelas);
        });
    }

    $data = $query->get();
    $mapel = $data->first()->mapel ?? null;

    // Hitung semester & tahun ajaran
    $bulan = Carbon::now()->month;
    $tahun = Carbon::now()->year;

    if ($bulan >= 7) {
            $semester = 'GANJIL';
            $tahun_awal = $tahun;
            $tahun_akhir = $tahun + 1;
    } else {
            $semester = 'GENAP';
            $tahun_awal = $tahun - 1;
            $tahun_akhir = $tahun;
    }

    $user = null;

    if (auth('guru')->check()) {
        $user = auth('guru')->user();
    } elseif (auth('admin')->check()) {
        $user = auth('admin')->user();
    }

    $pdf = Pdf::loadView('persensi.pdf', compact('data', 'kelas', 'mapel','semester','tahun_awal','tahun_akhir', 'user'))
              ->setPaper('legal', 'landscape');
    return $pdf->download('laporan-absensi-kelas-' . ($kelas ?? 'semua') . '.pdf');
}


    public function sharching(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $data = Absensi::whereHas('siswa', function ($query) use ($keyword) {
            $query->where('nama', 'like', "%$keyword%")
                ->orWhere('kelas', 'like', "%$keyword%");
        })->get();

        return view('persensi.persensi', compact('data', 'keyword'));
    }

    public function filter(Request $request)
    {
        $kelas = $request->kelas;
        $query = Siswa::query();
        $mapel = Mapel::all();

        if ($request->filled('nama')) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }
        if ($request->filled('kelas')) {
            $query->where('kelas', $kelas);
        }
        $data = $query->get();

        return view('persensi.filter', compact('data', 'kelas', 'mapel'));
    }

    public function show($kelas,  $id_mapel)
    {
        $response = Http::get('https://whatsapp-qrcode-production.up.railway.app/qr');
        $data = $response->json();
        return view('persensi.broadcase-wa', [
            'qr' => $data['qr'] ?? null,
            'status' => $data['status'],
            'kelas' => $kelas,
            'id_mapel' => $id_mapel,
        ]);
    }

    public function send(Request $request, $kelas, $id_mapel)
    {
        $siswaIdDiKelas = Siswa::where('kelas', $kelas)->pluck('id');
    if (!$siswaIdDiKelas->count()) {
        return back()->with('error', 'Tidak ada siswa di kelas ini.');
    }

    // Cek apakah sudah isi absen
    $sudahAbsen = Absensi::whereIn('id_siswa', $siswaIdDiKelas)
        ->where('id_guru', auth('guru')->id())
        ->where('id_mapel', $id_mapel)
        ->whereDate('created_at', Carbon::today())
        ->exists();
    if (!$sudahAbsen) {
        return back()->with('error', 'Anda belum mengisi absen untuk kelas ini hari ini.');
    }
    // Cek apakah broadcast sudah terkirim
    $sudahBroadcast = Absensi::whereIn('id_siswa', $siswaIdDiKelas)
        ->where('id_guru', auth('guru')->id())
        ->where('id_mapel', $id_mapel)
        ->whereDate('created_at', Carbon::today())
        ->where('broadcast_terkirim', true)
        ->exists();

    if ($sudahBroadcast) {
        return back()->with('error', 'Broadcast untuk kelas ini hari ini sudah dikirim.');
    }

    // Ambil data siswa dan absensi hari ini
    $siswaList = Siswa::where('kelas', $kelas)
        ->with(['absensiHariIni' => function ($q) use ($id_mapel) {
        $q->whereDate('created_at', Carbon::today())
          ->where('id_mapel', $id_mapel);
        }])
        ->get();
    $delay = 0;
    $nama_mapel = Mapel::find($id_mapel)?->nama_mapel ?? '-';

    foreach ($siswaList as $siswa) {
        if (!$siswa->nomer_wa) continue;
        $nomor = '62' . ltrim(preg_replace('/\D/', '', $siswa->nomer_wa), '0');
        $status = optional($siswa->absensiHariIni->first())->status ?? 'tidak diketahui';
        $pesan = "Siswa atas nama, *{$siswa->nama}*! Kehadiran hari ini pada mata pelajaran *{$nama_mapel}* tercatat sebagai *{$status}*.";
        KirimPesanWhatsApp::dispatch($nomor, $pesan)->delay(now()->addSeconds($delay));
        $delay += 3;
    }

    Absensi::whereIn('id_siswa', $siswaIdDiKelas)
        ->where('id_guru', auth('guru')->id())
        ->where('id_mapel', $id_mapel)
        ->whereDate('created_at', Carbon::today())
        ->update(['broadcast_terkirim' => true]);

    return back()->with('success', 'Broadcast berhasil dikirim!');
    }


    public function showLaporan()
    {
        $data = Siswa::all();
        return view('persensi.laporan' , compact('data'));
    }

    public function filterLaporan(Request $request)
    {
        $kelas = $request->kelas;
        $query = Absensi::with('siswa');

        if ($request->filled('nama')) {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama . '%');
            });
        }

        if ($request->filled('kelas')) {
            $query->whereHas('siswa', function ($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }

        $data = $query->paginate(10)->withQueryString();

        return view('persensi.filterLaporan', compact('data', 'kelas'));
    }

    public function edit(Request $request)
    {
        $kelas = $request->get('kelas');
        $data = collect();

        if ($kelas) {
            $data = Absensi::with('siswa')
                ->whereHas('siswa', function ($query) use ($kelas) {
                    $query->where('kelas', $kelas);
                })
                ->whereDate('created_at', Carbon::now()->timezone(config('app.timezone'))->toDateString())
                ->get()
                ->groupBy('id_siswa');
            }
        return view('persensi.edit', compact('data', 'kelas'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'absensi' => 'required|array',
        ]);
        foreach ($request->absensi as $id_siswa => $status) {
            Absensi::where('id_siswa', $id_siswa)
            ->whereDate('created_at', Carbon::today())
                ->update([
                    'status' => $status,
                ]);
        }
        return redirect()->route('persensi')->with('success', 'Status absensi berhasil diperbarui.');
    }
}
