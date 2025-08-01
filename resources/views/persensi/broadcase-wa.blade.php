@extends('index')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="text-center">
        <h2 class="mb-4" id="status-text">Status WhatsApp: {{ $status }}</h2>

        {{-- QR Code Section --}}
        <div class="qr-container">
            @if ($status == 'waiting' && $qr)
                <div class="mb-3">
                    <img src="{{ $qr }}" class="img-fluid" style="max-width: 300px;">
                </div>
                <p class="text-success">Silakan scan QR dengan WhatsApp</p>
            @elseif ($status == 'ready')
                <p class="text-success fw-bold fs-5">✅ WhatsApp siap!</p>
            @endif
        </div>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        <form action="{{ route('persensi.send', ['kelas' => $kelas, 'id_mapel' => $id_mapel]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mb-3">Kirim Broadcast WA</button>
        </form>          
    </div>
</div>
@endsection

<script>
    async function refreshQR() {
        try {
            const response = await fetch("http://localhost:3000/qr");
            const data = await response.json();

            const statusText = document.getElementById('status-text');
            const qrContainer = document.getElementById('qr-container');

            statusText.textContent = data.status;

            if (data.status === 'waiting' && data.qr) {
                qrContainer.innerHTML = `<img id="qr-image" src="${data.qr}" alt="QR Code" width="300">`;
            } else if (data.status === 'ready') {
                qrContainer.innerHTML = '<p>WhatsApp siap digunakan</p>';
            }
        } catch (error) {
            console.error('❌ Gagal memuat QR:', error);
        }
    }

    // Jalankan pertama kali
    refreshQR();

    // Perbarui setiap 10 detik
    setInterval(refreshQR, 10000);
</script>

