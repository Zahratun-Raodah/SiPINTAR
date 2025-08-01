@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Jurnal Mengajar</h2>
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
                                <h2>Jurnal Mengajar</h2>
                            </div>
                        </div>
                        <div class="full inbox_inner_section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white_shd full margin_bottom_30">
                                        <div>
                                            <div class="heading1 margin_0">
                                            </div>
                                        </div>
                                            <a href="{{ route('jurnal.tambah') }}" class="btn btn-info ml-5 mt-2">Tambah</a>
                                            <a href="{{ route('jurnal.preview') }}" class="btn btn-secondary mt-2"> Laporan</a>
                                            <div class="table_section padding_infor_info">
                                          <div class="table-responsive-sm">
                                            <table class="table table-hover table-bordered">
                                                @if (session('success'))
                                                <div class="alert alert-success">{{ session('success') }}</div>
                                                @endif
                                                <thead class="bg-info text-white text-center">
                                                    <tr class="text-center">
                                                       <th rowspan="2">No</th>
                                                       <th rowspan="2">Hari/Tanggal</th>
                                                       <th rowspan="2">Jam Ke-</th>
                                                       <th rowspan="2">Kelas</th>
                                                       <th rowspan="2">Kompetensi dasar</th>
                                                       <th rowspan="2">Kegiatan Belajar</th>
                                                       <th colspan="3">Absensi</th>
                                                       <th rowspan="2">Ket.</th>
                                                       <th rowspan="2">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                     <th>S</th>
                                                     <th>I</th>
                                                     <th>A</th>
                                                   </tr>
                                                 </thead>
                                                <tbody>
                                                    @foreach ($data as $index => $item)
                                                    <tr>
                                                       <td>{{ $index + 1 }}</td>
                                                       <td>{{ $item->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</td>
                                                       <td>{{ $item->jam_ke }}</td>
                                                       <td>{{ $item->kelas }}</td>
                                                       <td>{{ $item->kompetensi_dasar }}</td>
                                                       <td>{{ $item->kegiatan_belajar }}</td>
                                                       <td>{{ $item->absen_sakit }}</td>
                                                       <td>{{ $item->absen_izin }}</td>
                                                       <td>{{ $item->absen_alpha }}</td>
                                                       <td>{{ $item->keterangan }}</td>
                                                       <td>
                                                         <a href="{{ route('jurnal.edit', $item->id) }}" class="btn btn-warning">edit</a>
                                                       </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                             </table>
                                          </div>
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

