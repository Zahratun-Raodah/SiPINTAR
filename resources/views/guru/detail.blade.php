@extends('index')

@section('content')
<div class="section-header mt-4">
    <h1 class="mb-4">Detail Guru</h1>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-header">
            <h4>{{ $data->nama }}</h4>
        </div>
        <div class="card-body">
            <p><strong>NPSN:</strong> {{ $data->npsn }}</p>
            <p><strong>Unit Kerja:</strong> {{ $data->unit_kerja }}</p>
            <p><strong>Gelar Depan:</strong> {{ $data->grl_dpn }}</p>
            <p><strong>Nama:</strong> {{ $data->nama }}</p>
            <p><strong>Gelar Belakang:</strong> {{ $data->grl_belakang }}</p>
            <p><strong>NIP:</strong> {{ $data->nip }}</p>
            <p><strong>Pangkat:</strong> {{ $data->pangkat }}</p>
            <p><strong>Golongan:</strong> {{ $data->gol }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $data->jenis_kelamin }}</p>
            <p><strong>No Hp:</strong> {{ $data->no_hp }}</p>
            <p><strong>Mapel:</strong> {{ $data->mapel }}</p>
            <p><strong>Email:</strong> {{ $data->email }}</p>
            <p><strong>Alamat:</strong> {{ $data->alamat }}</p>
            <p><strong>Agama:</strong> {{ $data->agama }}</p>
            <p><strong>Status:</strong> {{ $data->status }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('guru') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
