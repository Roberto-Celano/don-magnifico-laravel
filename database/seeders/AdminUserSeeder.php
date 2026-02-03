<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminEmail = env('ADMIN_EMAIL', 'admin@donmagnifico.it');
        $adminPassword = env('ADMIN_PASSWORD', 'DonMagnifico2026!');
        $adminName = env('ADMIN_NAME', 'Admin Don Magnifico');

        // Crea l'utente admin se non esiste già
        User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'name' => $adminName,
                'password' => Hash::make($adminPassword),
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('✅ Utente admin creato con successo!');
        $this->command->info('📧 Email: ' . $adminEmail);
        $this->command->info('🔑 Password: ' . str_repeat('*', strlen($adminPassword)));
    }
}
