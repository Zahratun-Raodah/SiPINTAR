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
                    <h4>Tambah Jurnal Mengajar</h4>
                </div>
                <form action="{{ route('jurnal.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jam Ke-</label>
                            <input type="number" class="form-control" name="jam_ke" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas" id="kelasSelect" required>
                                <option value="" hidden>--pilih kelas--</option>
                                @foreach(['7A','7B','7C','7D','7E','7F','8A','8B','8C','8D','8E','8F','9A','9B','9C','9D','9E'] as $kelas)
                                    <option value="{{ $kelas }}">{{ $kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kompetensi dasar</label>
                            <input type="text" class="form-control" name="kompetensi_dasar" required>
                        </div>
                        <div class="form-group">
                            <label>Kegiatan Belajar</label>
                            <input type="text" class="form-control" name="kegiatan_belajar" required>
                        </div>
                        <div class="form-group">
                            <label>Absensi Sakit</label>
                            <input type="number" class="form-control" name="absen_sakit" id="absenSakit" readonly>
                        </div>
                        <div class="form-group">
                            <label>Absensi Izin</label>
                            <input type="number" class="form-control" name="absen_izin" id="absenIzin" readonly>
                        </div>
                        <div class="form-group">
                            <label>Absensi Alpa</label>
                            <input type="number" class="form-control" name="absen_alpha" id="absenAlpha" readonly>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">tambah</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
    $('#kelasSelect').on('change', function() {
        let kelas = $(this).val();

        if (kelas) {
            $.ajax({
                url: "{{ route('get.absensi') }}",
                method: "GET",
                data: { kelas: kelas },
                success: function(data) {
                    $('#absenSakit').val(data.sakit);
                    $('#absenIzin').val(data.izin);
                    $('#absenAlpha').val(data.alpha);
                }
            });
        }
    })
});
</script>
