<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Rifking',
            'email' => 'rifking@example.com',
            'password' => ('king123'),
        ]);
    }
}
