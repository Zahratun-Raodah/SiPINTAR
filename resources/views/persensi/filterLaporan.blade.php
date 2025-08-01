@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <!-- table section -->
                <div class="col-md-12 mt-5">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full inbox_inner_section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="full padding_infor_info">
                                        <div class="mail-box">
                                            <aside class="lg-side">
                                                <a href="{{ route('export.absensi', ['kelas' => request('kelas')]) }}" class="btn btn-success ml-3 mb-3">Download laporan</a>
                                                <a href="{{ route('persensi') }}" class="btn btn-secondary mb-3">Kembali</a>
                                                <div class="col-md">
                                                    <div class="white_shd full margin_bottom_30">
                                                    <div class="full graph_head">
                                                    </div>
                                                    <div class="table_section padding_infor_info">
                                                        <div class="table-responsive-sm">
                                                            <table class="table table-bordered">
                                                                <thead class="bg-info text-white text-center">
                                                                <tr class="text-center">
                                                                    <th rowspan="2">No</th>
                                                                    <th rowspan="2">Nisn</th>
                                                                    <th rowspan="2">Nama Siswa</th>
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
                                                                        <td>{{ $loop->iteration }}</td>                                                                        <td>{{ $siswa->nisn ?? '-' }}</td>
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

                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table section -->
            </div>
        </div>
    </div>
@endsection
