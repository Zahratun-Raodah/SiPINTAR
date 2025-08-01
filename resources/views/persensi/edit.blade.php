@extends('index')

@section('content')
<div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Halaman Ubah Presensi</h2>
                </div>
            </div>
        </div>

        <!-- Filter Kelas -->
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('persensi.edit') }}" method="GET" class="form-inline mb-4">
                    <select name="kelas" class="form-control mr-2">
                        <option value="">Pilih Kelas</option>
                        @foreach(['7A','7B','7C','7D','7E','7F','8A','8B','8C','8D','8E','8F','9A','9B','9C','9D','9E'] as $kls)
                            <option value="{{ $kls }}" {{ request('kelas') == $kls ? 'selected' : '' }}>{{ $kls }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-info">Cari</button>
                </form>
            </div>
        </div>

        <!-- Tampilkan Form Absensi Setelah Kelas Dipilih -->
        @if(request()->filled('kelas') && $data->count())
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('persensi.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <thead class="bg-info text-white text-center">
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Hadir</th>
                                <th>Izin</th>
                                <th>Sakit</th>
                                <th>Alpha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $siswaId => $absensiList)
                            @php
                                $absensi = $absensiList->first();
                                $siswa = $absensi->siswa;
                                $statusTerpilih = $absensi->status;
                            @endphp
                            <tr>
                                <td>{{ $siswa->nama }}</td>
                                @foreach(['Hadir', 'Izin', 'Sakit', 'Alpha'] as $status)
                                    <td class="text-center">
                                        <input type="radio"
                                            name="absensi[{{ $siswaId }}]"
                                            value="{{ $status }}"
                                            {{ $statusTerpilih === $status ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="kelas" value="{{ request('kelas') }}">

                    <div class="mt-3">
                        <button type="submit" class="btn btn-info">Edit</button>
                        <a href="{{ route('persensi') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
        @elseif(request()->filled('kelas'))
        <div class="alert alert-warning">
            Tidak ada data siswa untuk kelas {{ request('kelas') }}.
        </div>
        @endif
    </div>
</div>
@endsection
