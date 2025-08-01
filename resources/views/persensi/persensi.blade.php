    @extends('index')

    @section('content')
        <div class="midde_cont">
            <div class="container-fluid">
                <div class="row column_title">
                    <div class="col-md-12">
                        <div class="page_title">
                            <h2>Presensi</h2>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
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
                                                    <a href="{{ route('persensi.tambah') }}" class="btn btn-secondary mb-3">Absen</a>
                                                    <a href="{{ route('persensi.edit') }}" class="btn btn-warning mb-3">Edit</a>
                                                    <a href="{{ route('persensi.showLaporan') }}" class="btn btn-success mb-3">Laporan</a>
                                                    <div class="inbox-head">
                                                        <h3>Daftar Kehadiran</h3>
                                                        <form action="{{ route('persensi.search') }}" class="pull-right position search_inbox">
                                                            <div class="input-append">
                                                                <input type="text" class="sr-input" name="keyword"  value="{{ request('keyword') }}"
                                                                    placeholder="Search absensi">
                                                                <button class="btn sr-btn" type="submit"><i
                                                                        class="fa fa-search"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="white_shd full margin_bottom_30">
                                                        <div class="full graph_head">
                                                        </div>
                                                        <div class="table_section padding_infor_info">
                                                            <div class="table-responsive-sm">
                                                                <table class="table table-hover table-bordered">
                                                                    @if (session('success'))
                                                                    <div class="alert alert-success">{{ session('success') }}</div>
                                                                    @endif
                                                                    <thead class="bg-info text-white text-center">
                                                                    <tr class="text-center">
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Nis</th>
                                                                        <th>Jenis Kelamin</th>
                                                                        <th>Kelas</th>
                                                                        <th>Status Kehadiran</th>
                                                                    </tr>
                                                                    </>
                                                                    <tbody>
                                                                        @forelse ($data as $index => $item)
                                                                            <tr>
                                                                            <td class="text-center">{{ $index + 1 }}</td>
                                                                            <td>{{ $item->siswa->nama }}</td>
                                                                            <td>{{ $item->siswa->nisn }}</td>
                                                                            <td class="text-center">{{ $item->siswa->jenis_kelamin }}</td>
                                                                            <td class="text-center">{{ $item->siswa->kelas }}</td>
                                                                            <td class="text-center">{{ $item->status }}</td>
                                                                        </tr>
                                                                        @empty
                                                                        <tr>
                                                                            <td colspan="6" class="text-center">Siswa tidak ditemukan.</td>
                                                                        </tr>
                                                                        @endforelse
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
