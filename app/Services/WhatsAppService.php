<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Kirim notifikasi WhatsApp saat siswa Alpha
     */
    public static function sendAlphaNotification($nomorTujuan, $namaSiswa, $tanggal)
    {
        // Pastikan nomor diawali dengan kode negara
        if (substr($nomorTujuan, 0, 1) == '0') {
            $nomorTujuan = '62'.substr($nomorTujuan, 1);
        }

        $pesan = "*PEMBERITAHUAN KEHADIRAN SBANDA*\n\n"
               ."Yth. Orang Tua/Wali dari siswa :\n"
               ."Nama : *$namaSiswa*\n"
               ."Tanggal : $tanggal\n\n"
               .'Kami informasikan bahwa siswa tersebut hari ini berstatus *ALPHA* (Tidak Hadir tanpa keterangan). '
               ."Mohon segera login ke Portal Orang Tua dan ajukan Izin/Sakit jika memang berhalangan hadir.\n\n"
               ."Terima kasih,\nAdmin Sbanda.";

        // Menggunakan Fonnte API sebagai Gateway (contoh)
        // Set API_FONNTE_TOKEN di .env nantinya
        $token = env('API_FONNTE_TOKEN', 'MOCK_TOKEN');

        if ($token == 'MOCK_TOKEN') {
            // Jika belum ada token, log saja untuk keperluan portofolio
            Log::info("MOCK WHATSAPP SENT to $nomorTujuan: \n".$pesan);

            return true;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $nomorTujuan,
                'message' => $pesan,
                'countryCode' => '62', // optional
            ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Gagal mengirim WA Alpha: '.$e->getMessage());

            return false;
        }
    }
}
