@extends('index')

@section('content')
<div class="section-header mt-4">
    <h1 class="mb-4">Halaman Ubah</h1>
    </div>
    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg">
                <div class="card">
                    <div class="card-header">
                        <h4>Ubah Data Siswa</h4>
                    </div>
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
                    <form action="{{ route('siswa.update', [$data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Nipd</label>
                                <input type="text" class="form-control" name="nipd" value="{{ $data->nipd }}">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                <label for="laki-laki">Laki-laki</label><br>
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                <label for="perempuan">Perempuan</label>
                                {{-- <select class="form-control" name="jenis_kelamin">
                                    <option value="" hidden>--pilih jenis kelamin--</option>
                                    <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label>Nisn</label>
                                <input type="text" class="form-control" name="nisn" value="{{ $data->nisn }}">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
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
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" rows="3">{{ $data->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Dusun</label>
                                <textarea class="form-control" name="dusun" rows="3">{{ $data->dusun }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <textarea class="form-control" name="kelurahan" rows="3">{{ $data->kelurahan }}</textarea>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="" hidden>--pilih kelas--</option>
                                    @foreach(['7A','7B','7C','7D','7E','7F','8A','8B','8C','8D','8E','8F','9A','9B','9C','9D','9E'] as $kls)
                                        <option value="{{ $kls }}" {{ old('kelas', $data->kelas ?? '') == $kls ? 'selected' : '' }}>
                                            {{ $kls }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Orang tua</label>
                                <input type="text" class="form-control" name="nama_ortu" value="{{ $data->nama_ortu }}">
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Orang tua</label>
                                <input type="text" class="form-control" name="pekerjaan_ortu" value="{{ $data->pekerjaan_ortu }}">
                            </div>
                            <div class="form-group">
                                <label>Status Orang tua</label><br>
                                <input type="radio" id="masih-hidup" name="status_ortu" value="Masih hidup" {{ $data->status_ortu == 'Masih hidup' ? 'checked' : '' }}>
                                <label for="masih-hidup">Masih hidup</label><br>
                                <input type="radio" id="almarhum" name="status_ortu" value="Almarhum" {{ $data->status_ortu == 'Almarhum' ? 'checked' : '' }}>
                                <label for="almarhum">Almarhum</label>
                                {{-- <select class="form-control" name="status_ortu" id="">
                                    <option value="" hidden>--Status Orang tua--</option>
                                    <option value="Masih hidup" {{ $data->status_ortu == 'Masih hidup' ? 'selected' : '' }}>Masih hidup</option>
                                    <option value="Almarhum" {{ $data->status_ortu == 'Almarhum' ? 'selected' : '' }}>Almarhum</option>
                                </select> --}}
                            </div>
                            <div class="form-group">
                                <label>Nomer Whatshapp</label>
                                <input type="tel" class="form-control" name="nomer_wa" value="{{$data->nomer_wa}}">
                            </div>
                            <div>
                                <button class="btn btn-primary">Edit</button>
                                <a href="{{ route('siswa') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        @endsection