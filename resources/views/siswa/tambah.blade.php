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
                        <h4>Tambah Data Siswa</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        @if (Str::contains($error, 'nipd'))
                                            NIPD sudah digunakan atau tidak valid.
                                        @elseif (Str::contains($error, 'nisn'))
                                            NISN sudah digunakan atau tidak valid.
                                        @elseif (Str::contains($error, 'required'))
                                            yang wajib diisi.
                                        @else
                                            {{ $error }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                     @endif                
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Nipd</label>
                                <input type="text" class="form-control" name="nipd" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
                                <label for="laki-laki">Laki-laki</label><br>
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                                <label for="perempuan">Perempuan</label>
                                {{-- <select class="form-control" name="jenis_kelamin" id="">
                                    <option value="" hidden>--pilih jenis kelamin--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label>Nisn</label>
                                <input type="text" class="form-control" name="nisn" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <select class="form-control" name="agama" id="" required >
                                    <option value="" hidden>--pilih agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Dusun</label>
                                <textarea class="form-control" name="dusun" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <textarea class="form-control" name="kelurahan" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <select class="form-control" name="kelas" id="" required >
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
                                <label>Nama Orang tua</label>
                                <input type="text" class="form-control" name="nama_ortu" required>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Orang tua</label>
                                <input type="text" class="form-control" name="pekerjaan_ortu" required>
                            </div>
                            <div class="form-group">
                                <label>Status Orang tua</label><br>
                                <input type="radio" id="hidup" name="status_ortu" value="Masih hidup" required>
                                <label for="hidup">Masih Hidup</label><br>
                                <input type="radio" id="almarhum" name="status_ortu" value="Almarhum">
                                <label for="almarhum">Almarhum</label>
                                {{-- <select class="form-control" name="status_ortu" id="">
                                    <option value="" hidden>--status orang tua--</option>
                                    <option value="Masih hidup">Masih Hidup</option>
                                    <option value="Almarhum">Almarhum</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label>Nomer Whatshapp</label>
                                <input type="tel" class="form-control" name="nomer_wa" required>
                            </div>
                            <div>
                                <button class="btn btn-primary">Simpan</button>
                                <a href="{{ route('siswa') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    @endsection
