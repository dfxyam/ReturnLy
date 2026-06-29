<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // updateOrCreate: Cek username 'admin', jika ada diupdate, jika tidak ada dibuat baru
        Admin::updateOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('password'),
            ]
        );

        $this->command->info('✅ Admin user ready!');
    }
}