@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Persensi</h2>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <!-- table section -->
                <div class="col-md-12">
                    <form action="{{ route('persensi.store') }}" method="POST">
                        <input type="hidden" name="kelas" value="{{ $kelas }}">
                        @csrf
                    <div class="d-flex justify-content-end">
                        <select name="id_mapel" class="sr-input mb-5" required>
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach($mapel as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                            @endforeach
                        </select>
                    </div>
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
                                @foreach($data as $item)
                                <input type="hidden" name="id_siswa[]" value="{{ $item->id }}">
                                    <tr>
                                        <td class="border border-gray-400 px-4 py-2">{{ $item->nama }}</td>
                                        @foreach(['Hadir', 'Izin', 'Sakit', 'Alpha'] as $status)
                                            <td class="border border-gray-400 px-4 py-2 text-center">
                                                <input type="radio" name="absensi[{{ $item->id }}]" value="{{ $status }}" required>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $data->withQueryString()->links() }} --}}
                        <button type="submit" class="btn btn-info mt-4 rounded">Simpan Absensi</button>
                        <a href="{{ route('persensi') }}" class="btn btn-secondary mt-4">Kembali</a>
                    </form>
                </div>
                <!-- table section -->
            </div>
        </div>
    </div>
@endsection


