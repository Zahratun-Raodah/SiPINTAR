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
                    <h4>Tambah Data Guru</h4>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                @if (Str::contains($error, 'nip'))
                                    NIP sudah digunakan atau tidak valid.
                                @elseif (Str::contains($error, 'email'))
                                    Email sudah digunakan atau tidak valid.
                                @elseif (Str::contains($error, 'password'))
                                    Password minimal 6 karakter.
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
                <form action="{{ route('guru.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>NPSN <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="npsn" value="{{ old('npsn') }}" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Unit Kerja <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="unit_kerja" value="{{ old('unit_kerja') }}" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Gelar Depan <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="grl_dpn" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Gelar Belakang <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="grl_belakang" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Nip</label>
                            <input type="text" class="form-control" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label>Pangkat <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="pangkat" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Golongan <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="gol" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" required>
                            <label for="laki-laki">Laki-laki</label><br>
                            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                            <label for="perempuan">Perempuan</label>
                            {{-- <select class="form-control" name="jenis_kelamin" id="" required>
                                <option value="" hidden>--pilih jenis kelamin--</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select> --}}
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="tel" class="form-control" name="no_hp">
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="mapel" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" name="agama" id="" required>
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
                            <label>Status</label><br>
                            <input type="radio" id="guru" name="status" value="Guru" required>
                            <label for="guru">Guru</label><br>
                            <input type="radio" id="kepsek" name="status" value="Kepala Sekolah">
                            <label for="kepsek">Kepala Sekolah</label>
                            {{-- <select class="form-control" name="status" id="" required>
                                <option value="" hidden>--pilih status--</option>
                                <option value="Admin">Admin</option>
                                <option value="Guru">Guru</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                            </select> --}}
                        </div>
                        <div class="form-group" required>
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>
                        <div>
                            <button class="btn btn-primary">tambah</button>
                            <a href="{{ route('guru') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
