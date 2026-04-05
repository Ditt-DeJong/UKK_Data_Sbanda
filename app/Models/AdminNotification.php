<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    protected $fillable = [
        'tipe',
        'pesan',
        'data',
        'dibaca',
    ];

    protected $casts = [
        'data' => 'array',
    ];
}
