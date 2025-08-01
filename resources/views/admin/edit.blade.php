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
                    <h4>Edit Data Admin</h4>
                </div>
                <form action="{{ route('admin.update', [$data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                        </div>
                         <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $data->email }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Isi jika ingin mengganti">
                        </div>
                        <div>
                            <button class="btn btn-primary">edit</button>
                            <a href="{{ route('admin') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection