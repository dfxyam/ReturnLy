<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $token;
    protected $url;

    public function __construct()
    {
        $this->token = env('FONNTE_TOKEN');
        $this->url = 'https://api.fonnte.com/send';
    }

    public function sendMessage($phone, $message)
    {
        try {
            // Format nomor HP (pastikan pakai 62 di depan, bukan 0)
            $formattedPhone = $this->formatPhone($phone);

            $response = Http::withHeaders([
                'Authorization' => $this->token,
            ])->post($this->url, [
                'target' => $formattedPhone,
                'message' => $message,
                'countryCode' => '62', // Opsional, tapi bagus untuk memastikan
            ]);

            if ($response->successful()) {
                Log::info('WhatsApp berhasil dikirim ke ' . $formattedPhone);
                return true;
            }

            Log::error('Gagal kirim WhatsApp: ' . $response->body());
            return false;
        } catch (\Exception $e) {
            Log::error('Error WhatsApp Service: ' . $e->getMessage());
            return false;
        }
    }

    // Fungsi helper untuk merapikan format nomor HP
    private function formatPhone($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone); // Hapus semua kecuali angka
        
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1); // Ganti 0 di depan dengan 62
        }
        
        return $phone;
    }
}