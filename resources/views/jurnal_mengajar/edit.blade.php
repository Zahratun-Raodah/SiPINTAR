@extends('index');

@section('content')
<div class="section-header mt-3">
    <h1 class="mb-4">Halaman Edit</h1>
</div>
<div class="section-body">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Jurnal Mengajar</h4>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('jurnal.update', [$data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jam Ke-</label>
                            <input type="number" class="form-control" name="jam_ke" value="{{$data->jam_ke}}">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas" id="" required>
                                <option value="" hidden>--pilih kelas--</option>
                                <option value="7A" {{ $data->kelas == '7A' ? 'selected' : '' }}>7A</option>
                                <option value="7B" {{ $data->kelas == '7B' ? 'selected' : '' }}>7B</option>
                                <option value="7C" {{ $data->kelas == '7C' ? 'selected' : '' }}>7C</option>
                                <option value="7D" {{ $data->kelas == '7D' ? 'selected' : '' }}>7D</option>
                                <option value="7E" {{ $data->kelas == '7E' ? 'selected' : '' }}>7E</option>
                                <option value="7F" {{ $data->kelas == '7F' ? 'selected' : '' }}>7F</option>
                                <option value="8A" {{ $data->kelas == '8A' ? 'selected' : '' }}>8A</option>
                                <option value="8B" {{ $data->kelas == '8B' ? 'selected' : '' }}>8B</option>
                                <option value="8C" {{ $data->kelas == '8C' ? 'selected' : '' }}>8C</option>
                                <option value="8D" {{ $data->kelas == '8D' ? 'selected' : '' }}>8D</option>
                                <option value="8E" {{ $data->kelas == '8E' ? 'selected' : '' }}>8E</option>
                                <option value="8F" {{ $data->kelas == '8F' ? 'selected' : '' }}>8F</option>
                                <option value="9A" {{ $data->kelas == '9A' ? 'selected' : '' }}>9A</option>
                                <option value="9B" {{ $data->kelas == '9B' ? 'selected' : '' }}>9B</option>
                                <option value="9C" {{ $data->kelas == '9C' ? 'selected' : '' }}>9C</option>
                                <option value="9D" {{ $data->kelas == '9D' ? 'selected' : '' }}>9D</option>
                                <option value="9E" {{ $data->kelas == '9E' ? 'selected' : '' }}>9E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi dasar</label>
                            <input type="text" class="form-control" name="kompetensi_dasar" value="{{$data->kompetensi_dasar}}">
                        </div>
                        <div class="form-group">
                            <label>Kegiatan Belajar</label>
                            <input type="text" class="form-control" name="kegiatan_belajar" value="{{$data->kegiatan_belajar}}">
                        </div>
                        <div class="form-group">
                            <label>Absensi S</label>
                            <input type="number" class="form-control" name="absen_sakit" value="{{$data->absen_sakit}}">
                        </div>
                        <div class="form-group">
                            <label>Absensi I</label>
                            <input type="number" class="form-control" name="absen_izin" value="{{$data->absen_izin}}">
                        </div>
                        <div class="form-group">
                            <label>Absensi A</label>
                            <input type="number" class="form-control" name="absen_alpha" value="{{$data->absen_alpha}}">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="{{$data->keterangan}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">edit</button>
                            <a href="{{ route('jurnal') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection