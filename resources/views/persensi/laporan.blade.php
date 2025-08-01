@extends('index')

@section('content')
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Laporan Presensi</h2>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <form action="{{ route('persensi.filterLaporan') }}">
                    <select name="kelas" class="sr-input">
                        <option value="">Cari Kelas</option>
                        <option value="7A" {{ request('kelas') == '7A' ? 'selected' : '' }}>7A</option>
                        <option value="7B" {{ request('kelas') == '7B' ? 'selected' : '' }}>7B</option>
                        <option value="7C" {{ request('kelas') == '7C' ? 'selected' : '' }}>7C</option>
                        <option value="7D" {{ request('kelas') == '7D' ? 'selected' : '' }}>7D</option>
                        <option value="7E" {{ request('kelas') == '7E' ? 'selected' : '' }}>7E</option>
                        <option value="7F" {{ request('kelas') == '7F' ? 'selected' : '' }}>7F</option>
                        <option value="8A" {{ request('kelas') == '8A' ? 'selected' : '' }}>8A</option>
                        <option value="8B" {{ request('kelas') == '8B' ? 'selected' : '' }}>8B</option>
                        <option value="8C" {{ request('kelas') == '8C' ? 'selected' : '' }}>8C</option>
                        <option value="8D" {{ request('kelas') == '8D' ? 'selected' : '' }}>8D</option>
                        <option value="8E" {{ request('kelas') == '8E' ? 'selected' : '' }}>8E</option>
                        <option value="8F" {{ request('kelas') == '8F' ? 'selected' : '' }}>8F</option>
                        <option value="8A" {{ request('kelas') == '8A' ? 'selected' : '' }}>8A</option>
                        <option value="9B" {{ request('kelas') == '9B' ? 'selected' : '' }}>9B</option>
                        <option value="9C" {{ request('kelas') == '9C' ? 'selected' : '' }}>9C</option>
                        <option value="9D" {{ request('kelas') == '9D' ? 'selected' : '' }}>9D</option>
                        <option value="9E" {{ request('kelas') == '9E' ? 'selected' : '' }}>9E</option>
                    </select>
                    <button type="submit" class="btn sr-btn bg-success text-white">cari</button>
                </form>
            </div>
        </div>
    </div>
@endsection
