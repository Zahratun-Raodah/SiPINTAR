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
                    <h4>Tambah Data Admin</h4>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                @if (Str::contains($error, 'email'))
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
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div>
                            <button class="btn btn-primary">tambah</button>
                            <a href="{{ route('admin') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection