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
                    <h4>Tambah Data Profil</h4>
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
                <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Lembaga</label>
                            <input type="text" class="form-control" name="nama_lembaga" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="text" class="form-control" name="nama_instansi" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" class="form-control" name="nama_sekolah" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berdiri</label>
                            <input type="text" class="form-control" name="tgl_berdiri" required>
                        </div>
                        <div class="form-group">
                            <label>No SK</label>
                            <input type="text" class="form-control" name="no_sk" required>
                        </div>
                        <div class="form-group">
                            <label>Akreditasi</label>
                            <input type="text" class="form-control" name="akreditasi" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Pimpinan</label>
                            <input type="text" class="form-control" name="nama_pimpinan" required>
                        </div>
                        <div class="form-group">
                            <label>No Hp Instansi</label>
                            <input type="tel" class="form-control" name="noHp_instansi" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" class="form-control" name="logo" required>
                        </div>
                        <div class="form-group">
                            <label>Visi</label>
                            <input type="text" class="form-control" name="visi" required>
                        </div>
                        <div>
                        <div class="form-group">
                            <label>Misi</label>
                            <input type="text" class="form-control" name="misi" required>
                        </div>
                        <div>
                            <button class="btn btn-primary">tambah</button>
                            <a href="{{ route('profil') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection