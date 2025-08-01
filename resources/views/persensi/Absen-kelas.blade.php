@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <!-- row -->
            <div class="row mt-5">
                <!-- table section -->
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>Presensi</h2>
                            </div>
                        </div>
                        <div class="full inbox_inner_section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="full padding_infor_info">
                                        <div class="mail-box">
                                            <aside class="lg-side">
                                                <div class="col-md">
                                                    <div class="white_shd full margin_bottom_30">
                                                    <div class="full graph_head mb-3">
                                                    </div>
                                                    @if ($data->isNotEmpty())
                                                    <div class="row ml-2">
                                                        <div class="col-md-6">
                                                            <h5><strong>Kelas:</strong> {{ $kelas ?? '-' }}</h5>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h5><strong>Mata Pelajaran:</strong> {{ $mapel?->nama_mapel ?? '-' }}</h5>
                                                        </div>
                                                    </div>
                                                     @endif
                                                    <div class="table_section padding_infor_info">
                                                        <div class="table-responsive-sm">
                                                            <table class="table table-hover table-bordered">
                                                                <thead class="bg-info text-white text-center">
                                                                <tr class="text-center">
                                                                    <th>No</th>
                                                                    <th>Nama</th>
                                                                    <th>Nisn</th>
                                                                    <th>Jenis Kelamin</th>
                                                                    <th>Status Kehadiran</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse ($data as $index => $item)
                                                                        <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $item->siswa->nama }}</td>
                                                                        <td>{{ $item->siswa->nisn }}</td>
                                                                        <td>{{ $item->siswa->jenis_kelamin }}</td>
                                                                        <td>{{ $item->status }}</td>
                                                                    </tr>
                                                                    @empty
                                                                    <tr>
                                                                        <td colspan="6" class="text-center">Siswa tidak ditemukan.</td>
                                                                    </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                            <a href="{{ route('persensi.show', ['kelas' => $kelas, 'id_mapel' => $id_mapel]) }}" class="btn btn-info mb-3">Broadcast Wa</a>
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
