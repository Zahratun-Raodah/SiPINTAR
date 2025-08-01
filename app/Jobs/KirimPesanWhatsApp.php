<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;


class KirimPesanWhatsApp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $nomor;
    public $pesan;

    public function __construct($nomor, $pesan)
    {
        $this->nomor = $nomor;
        $this->pesan = $pesan;
    }

    public function handle()
    {
        try {
            // $response = Http::post('http://localhost:3000/persensi/send', [
            $response = Http::post('http://127.0.0.1:3000/persensi/send', [
                'number' => $this->nomor,
                'message' => $this->pesan
            ]);

            \Log::info('📤 Kirim WA ke ' . $this->nomor);
            \Log::info('📩 Respons API: ' . $response->body());

            if (!$response->successful()) {
                \Log::error('❌ Gagal kirim WA ke ' . $this->nomor . '. Status: ' . $response->status());
            }

        } catch (\Exception $e) {
            \Log::error('❗ Exception kirim WA ke ' . $this->nomor . ': ' . $e->getMessage());
        }

    }
}

