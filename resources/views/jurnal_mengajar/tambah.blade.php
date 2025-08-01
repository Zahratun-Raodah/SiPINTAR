@extends('index')

@section('content')
<div class="section-header mt-4">
    <h1 class="mb-4">Halaman Tambah</h1>
</div>
<div class="section-body">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Jurnal Mengajar</h4>
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
                <form action="{{ route('jurnal.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jam Ke-</label>
                            <input type="number" class="form-control" name="jam_ke" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas" id="" required>
                                <option value="" hidden>--pilih kelas--</option>
                                <option value="7A">7A</option>
                                <option value="7B">7B</option>
                                <option value="7C">7C</option>
                                <option value="7D">7D</option>
                                <option value="7E">7E</option>
                                <option value="7F">7F</option>
                                <option value="8A">8A</option>
                                <option value="8B">8B</option>
                                <option value="8C">8C</option>
                                <option value="8D">8D</option>
                                <option value="8E">8E</option>
                                <option value="8F">8F</option>
                                <option value="9A">9A</option>
                                <option value="9B">9B</option>
                                <option value="9C">9C</option>
                                <option value="9D">9D</option>
                                <option value="9E">9E</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi dasar</label>
                            <input type="text" class="form-control" name="kompetensi_dasar" required>
                        </div>
                        <div class="form-group">
                            <label>Kegiatan Belajar</label>
                            <input type="text" class="form-control" name="kegiatan_belajar" required>
                        </div>
                        <div class="form-group">
                            <label>Absensi Sakit</label>
                            <input type="number" class="form-control" name="absen_sakit" required>
                        </div>
                        <div class="form-group">
                            <label>Absensi Izin</label>
                            <input type="number" class="form-control" name="absen_izin" required>
                        </div>
                        <div class="form-group">
                            <label>Absensi Alpa</label>
                            <input type="number" class="form-control" name="absen_alpha" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">tambah</button>
                            <a href="{{ route('jurnal') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection