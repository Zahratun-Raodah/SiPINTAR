@extends('index')

@section('content')
<div class="section-header mt-4">
    <h1 class="mb-4">Detail</h1>
</div>
<div class="section-body">
    <div class="card">
        @foreach ($data as $item)
        <div class="card-header">
            <h4>{{ $item->nama_sekolah }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama Lembaga:</strong> {{ $item->nama_lembaga }}</p>
            <p><strong>Nama Instansi:</strong> {{ $item->nama_instansi }}</p>
            <p><strong>Nama Sekolah:</strong> {{ $item->nama_sekolah }}</p>
            <p><strong>Alamat:</strong> {{ $item->alamat }}</p>
            <p><strong>Tanggal Berdiri:</strong> {{ $item->tgl_berdiri }}</p>
            <p><strong>No Sk:</strong> {{ $item->no_sk }}</p>
            <p><strong>Akreditasi:</strong> {{ $item->akreditasi }}</p>
            <p><strong>Nama Pimpinan:</strong> {{ $item->nama_pimpinan }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</p>
            <p><strong>No Hp Instansi:</strong> {{ $item->noHp_instansi }}</p>
            <p><strong>Email:</strong> {{ $item->email }}</p>
            <p><strong>Logo:</strong> {{ $item->logo }}</p>
            <p><strong>Visi:</strong> {{ $item->visi }}</p>
            <p><strong>Misi:</strong> {{ $item->misi }}</p>
        </div>
        @endforeach
        <div class="card-footer">
            <a href="{{ route('profil') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
