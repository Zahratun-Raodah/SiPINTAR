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
                    <h4>Edit Data Profil</h4>
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
                @foreach ($data as $item)
                <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Lembaga</label>
                            <input type="text" class="form-control" name="nama_lembaga" value="{{ $item->nama_lembaga }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Instansi</label>
                            <input type="text" class="form-control" name="nama_instansi" value="{{ $item->nama_instansi }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input type="text" class="form-control" name="nama_sekolah" value="{{ $item->nama_sekolah }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $item->alamat }}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berdiri</label>
                            <input type="text" class="form-control" name="tgl_berdiri" value="{{ $item->tgl_berdiri }}">
                        </div>
                        <div class="form-group">
                            <label>No SK</label>
                            <input type="text" class="form-control" name="no_sk" value="{{ $item->no_sk }}">
                        </div>
                        <div class="form-group">
                            <label>Akreditasi</label>
                            <input type="text" class="form-control" name="akreditasi" value="{{ $item->akreditasi }}">
                        </div>
                        <div class="form-group">
                            <label>Nama Pimpinan</label>
                            <input type="text" class="form-control" name="nama_pimpinan" value="{{ $item->nama_pimpinan }}">
                        </div>
                        <div class="form-group">
                            <label>No Hp Instansi</label>
                            <input type="tel" class="form-control" name="noHp_instansi" value="{{ $item->noHp_instansi }}">
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $item->email }}">
                        </div>                      
                        <div class="form-group">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Visi</label>
                            <input type="text" class="form-control" name="visi" value="{{ $item->visi }}">
                        </div>
                        <div class="form-group">
                            <label>Misi</label>
                            <input type="text" class="form-control" name="misi" value="{{ $item->misi }}">
                        </div>
                        <div>
                            <button class="btn btn-primary">edit</button>
                            <a href="{{ route('profil') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
@endsection