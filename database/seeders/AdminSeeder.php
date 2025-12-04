<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminExists = User::where('email', 'admin@sbanda.com')->first();
        
        if (!$adminExists) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@sbanda.com',
                'password' => Hash::make('admin123'), // Ganti password ini!
                'role' => 'admin',
                'is_completed' => true,
            ]);
            
            $this->command->info('✓ Admin user created successfully!');
            $this->command->info('  Email: admin@sbanda.com');
            $this->command->info('  Password: admin123');
        } else {
            $this->command->warn('Admin user already exists!');
        }
    }
}