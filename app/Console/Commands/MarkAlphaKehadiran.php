<?php

namespace App\Console\Commands;

use App\Models\DataSiswa;
use App\Models\Kehadiran;
use Carbon\Carbon;
use Illuminate\Console\Command;

class MarkAlphaKehadiran extends Command
{
    protected $signature = 'kehadiran:mark-alpha';

    protected $description = 'Tandai ALPHA untuk siswa yang tidak memiliki data kehadiran hari ini';

    public function handle()
    {
        $today = Carbon::today();

        // Hanya jalankan di hari kerja (Senin-Jumat)
        if ($today->isWeekend()) {
            $this->info('Hari ini akhir pekan, tidak ada marking alpha.');

            return 0;
        }

        // Ambil semua siswa yang statusnya sudah approved
        $siswaList = DataSiswa::where('status_approval', 'approved')->get();
        $count = 0;

        foreach ($siswaList as $siswa) {
            // Cek apakah siswa ini sudah punya data kehadiran hari ini
            $exists = Kehadiran::where('user_id', $siswa->user_id)
                ->whereDate('tanggal', $today)
                ->exists();

            // Jika belum ada, tandai sebagai ALPHA
            if (! $exists) {
                Kehadiran::create([
                    'user_id' => $siswa->user_id,
                    'tanggal' => $today,
                    'status' => 'ALPHA',
                    'keterangan' => 'murid dinyatakan alpha karena tidak hadir dan tidak memberikan surat ijin, mohon ajukan ijin segera',
                ]);

                $orangTua = $siswa->user->dataOrangTua ?? null;
                if ($orangTua && $orangTua->nomor_telepon) {
                    \App\Services\WhatsAppService::sendAlphaNotification(
                        $orangTua->nomor_telepon,
                        $siswa->nama_siswa ?? 'Siswa SBANDA',
                        $today->toDateString()
                    );
                }

                $count++;
            }
        }

        $this->info("Selesai. {$count} siswa ditandai ALPHA untuk tanggal {$today->format('Y-m-d')}.");

        return 0;
    }
}
