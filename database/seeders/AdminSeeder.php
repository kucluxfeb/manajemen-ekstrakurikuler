<?php

namespace Database\Seeders;

use App\Models\Admin;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama_lengkap' => 'Admin',
            'nomor_telepon' => '081234567890',
            'username' => 'admin',
            'role' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> Hash::make('password'),
        ]);
    }
}
