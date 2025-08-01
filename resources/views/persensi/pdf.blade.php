<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Hadir Siswa</title>
    <link href="{{ public_path('asset/css/laporan-absensi.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="header">
        <h1>DAFTAR HADIR SISWA SMPN 2 KURIPAN</h1>
        <h2>SEMESTER GENAP TP. {{ $tahun_awal }} / {{ $tahun_akhir }}</h2>
    </div>
    <table class="info">
        <tr>
            <td><strong>Kelas / Semester</strong></td>
            <td>: {{ $kelas ?? '-' }} / {{ $semester }}</td>
            <td><strong>Nama Guru</strong></td>
            <td>: {{ $user->nama ?? '-' }}</td>
        </tr>
        <tr>
            <td><strong>Mata Pelajaran</strong></td>
            <td>: {{ $mapel->nama_mapel ?? '-' }}</td>
            <td><strong>NIP</strong></td>
            <td>: {{ $user->nip ?? '-' }}</td>
        </tr>
    </table>
    <table class="absensi-table">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                {{-- <th rowspan="2">NISN</th> --}}
                <th rowspan="2">NISN</th>
                <th rowspan="2" class="left">Nama Siswa</th>
                <th rowspan="2">L/P</th>
                <th colspan="31">PERTEMUAN KE</th>
                <th colspan="4">JUMLAH</th>
            </tr>
            <tr>
                @for ($i = 1; $i <= 31; $i++)
                    <th>{{ $i }}</th>
                @endfor
                <th>S</th>
                <th>I</th>
                <th>A</th>
                <th>H</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->groupBy('id_siswa') as $i => $absenSiswa)
                @php
                    $siswa = $absenSiswa->first()->siswa;
                    $statusCounts = ['Sakit' => 0, 'Izin' => 0, 'Alpha' => 0, 'Hadir' => 0];
                    $pertemuan = [];

                    foreach ($absenSiswa as $absen) {
                        $hari = \Carbon\Carbon::parse($absen->created_at)->day;
                        $huruf = strtoupper(substr($absen->status, 0, 1)); // H/I/S/A
                        $pertemuan[$hari] = $huruf;
                        $statusCounts[$absen->status] = ($statusCounts[$absen->status] ?? 0) + 1;
                    }
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ $siswa->nis ?? '-' }}</td> --}}
                    <td>{{ $siswa->nisn ?? '-' }}</td>
                    <td class="left">{{ $siswa->nama ?? '-' }}</td>
                    <td>{{ $siswa->jenis_kelamin ?? '-' }}</td>

                    @for ($d = 1; $d <= 31; $d++)
                        <td>{{ $pertemuan[$d] ?? '' }}</td>
                    @endfor

                    <td>{{ $statusCounts['Sakit'] }}</td>
                    <td>{{ $statusCounts['Izin'] }}</td>
                    <td>{{ $statusCounts['Alpha'] }}</td>
                    <td>{{ $statusCounts['Hadir'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
