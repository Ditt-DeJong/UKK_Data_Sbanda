<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Auto-Alpha: Tandai siswa yang tidak hadir setiap hari kerja jam 17:00
Schedule::command('kehadiran:mark-alpha')->weekdays()->dailyAt('17:00');
