<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Kehadiran;
use Carbon\Carbon;

class GenerateKehadiranHarian extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'kehadiran:generate {--date=}';

    /**
     * The console command description.
     */
    protected $description = 'Generate kehadiran harian untuk semua user yang sudah complete';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Tentukan tanggal (gunakan parameter atau hari ini)
        $tanggal = $this->option('date') 
            ? Carbon::parse($this->option('date')) 
            : Carbon::today();

        // Hanya buat untuk hari kerja (Senin-Jumat)
        if ($tanggal->isWeekend()) {
            $this->info('Hari ini weekend, tidak ada kehadiran yang dibuat.');
            return 0;
        }

        // Ambil semua user yang sudah complete
        $users = User::where('is_completed', true)->get();

        $created = 0;
        $skipped = 0;

        foreach ($users as $user) {
            // Cek apakah sudah ada record untuk tanggal ini
            $exists = Kehadiran::where('user_id', $user->id)
                              ->where('tanggal', $tanggal->format('Y-m-d'))
                              ->exists();

            if (!$exists) {
                Kehadiran::create([
                    'user_id' => $user->id,
                    'tanggal' => $tanggal->format('Y-m-d'),
                    'status' => 'HADIR',
                    'keterangan' => 'Tepat Waktu'
                ]);
                $created++;
                $this->info("✓ Created untuk user: {$user->name}");
            } else {
                $skipped++;
            }
        }

        $this->info("\n==========================================");
        $this->info("Kehadiran berhasil dibuat untuk tanggal: {$tanggal->format('d-m-Y')}");
        $this->info("Created: {$created} | Skipped: {$skipped}");
        $this->info("==========================================");

        return 0;
    }
}