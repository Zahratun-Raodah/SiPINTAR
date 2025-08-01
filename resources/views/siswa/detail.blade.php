@extends('index')

@section('content')
<div class="section-header mt-4">
    <h1 class="mb-4">Detail Siswa</h1>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>{{ $data->nama }}</h4>
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $data->nama }}</p>
            <p><strong>NIPD:</strong> {{ $data->nipd }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $data->jenis_kelamin }}</p>
            <p><strong>NISN:</strong> {{ $data->nisn }}</p>
            <p><strong>Tempat Lahir:</strong> {{ $data->tempat_lahir }}</p>
            <p><strong>Agama:</strong> {{ $data->agama }}</p>
            <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
            <p><strong>Dusun:</strong> {{ $data->dusun }}</p>
            <p><strong>Kelurahan:</strong> {{ $data->kelurahan }}</p>
            <p><strong>Kelas:</strong> {{ $data->kelas }}</p>
            <p><strong>Nama Orang Tua:</strong> {{ $data->nama_ortu }}</p>
            <p><strong>Pekerjaan Orang Tua:</strong> {{ $data->pekerjaan_ortu }}</p>
            <p><strong>Status Orang Tua:</strong> {{ $data->status_ortu }}</p>
            <p><strong>No. WhatsApp:</strong> {{ $data->nomer_wa }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('siswa') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
