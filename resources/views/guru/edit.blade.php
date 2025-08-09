@extends('index')

@section('content')
<div class="section-header mt-4">
    <h1 class="mb-4">Halaman Edit</h1>
</div>
<div class="section-body">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Data Guru</h4>
                </div>
                <form action="{{ route('guru.update', [$data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Gelar Depan <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="grl_dpn" value="{{ $data->grl_dpn }}" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Gelar Belakang <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="grl_belakang" value="{{ $data->grl_belakang }}" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Nip</label>
                            <input type="text" class="form-control" name="nip" value="{{ $data->nip }}">
                        </div>
                        <div class="form-group">
                            <label>Pangkat <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="pangkat" value="{{ $data->pangkat }}" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Golongan <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="gol" value="{{ $data->gol }}" placeholder="Isi jika ada">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                            <label for="laki-laki">Laki-laki</label><br>
                            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                            <label for="perempuan">Perempuan</label>
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input type="tel" class="form-control" name="no_hp" value="{{ $data->no_hp }}">
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran <small class="text-muted">(Opsional)</small></label>
                            <input type="text" class="form-control" name="mapel" value="{{ $data->mapel }}" placeholder="Isi jika ada">
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3">{{ $data->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select class="form-control" name="agama" id="" required>
                                <option value="" hidden>--pilih agama--</option>
                                <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Kristen Protestan" {{ $data->agama == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                <option value="Katolik" {{ $data->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Buddha" {{ $data->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ $data->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label><br>
                            <input type="radio" id="guru" name="status" value="Guru" {{ $data->status == 'Guru' ? 'checked' : '' }}>
                            <label for="guru">Guru</label><br>
                            <input type="radio" id="kepala-sekolah" name="status" value="Kepala Sekolah" {{ $data->status == 'Kepala Sekolah' ? 'checked' : '' }}>
                            <label for="kepala-sekolah">Kepala Sekolah</label>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Isi jika ingin mengganti">
                        </div>
                        <div>
                            <button class="btn btn-primary">edit</button>
                            <a href="{{ route('guru') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
