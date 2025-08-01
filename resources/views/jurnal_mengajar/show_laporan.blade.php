<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jurnal / Agenda Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ public_path('asset/css/jurnal_pdf.css') }}">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('export.jurnal') }}" class="btn btn-warning btn-download">Download Laporan</a>
            <a href="{{ route('jurnal') }}" class="btn btn-secondary ml-2" >kembali</a>
        </div>
        <hr>
        <h5 class="text-center mt-5 mb-4">
            JURNAL / AGENDA GURU SMPN 2 KURIPAN {{ $semester }} TP. {{ $tahun_awal }} - {{ $tahun_akhir }}
        </h5>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Hari / Tanggal</th>
                    <th>Jam Ke</th>
                    <th>Kls</th>
                    <th>Kompetensi Dasar (CP/TP)</th>
                    <th>Kegiatan Belajar Mengajar</th>
                    <th>S</th>
                    <th>I</th>
                    <th>A</th>
                    <th>Ket</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                    <td>{{ $item->jam_ke }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->kompetensi_dasar }}</td>
                    <td>{{ $item->kegiatan_belajar }}</td>
                    <td>{{ $item->absen_sakit }}</td>
                    <td>{{ $item->absen_izin }}</td>
                    <td>{{ $item->absen_alpha }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table style="width: 100%; margin-top: 60px;">
            <tr>
                <td style="width: 50%; text-align: center;">
                    Mengetahui,<br>
                    <strong>Kepala Sekolah</strong>
                    <br><br><br><br>
                @if($kepala_sekolah)
                    <p><strong>{{ $kepala_sekolah->nama }}</strong></p>
                    <p>NIP: {{ $kepala_sekolah->nip }}</p>
                @endif
                </td>
                <td style="width: 50%; text-align: center;">
                    Kuripan, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                    <strong>Guru Mata Pelajaran</strong>
                    <br><br><br><br>
                    <strong>{{ $namaUser }}</strong><br>
                    NIP: {{ $nip }}
                </td>
            </tr>
        </table>
</body>
</html>
