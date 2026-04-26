<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@somameat.com'],
            [
                'name'              => 'Administrador Soma',
                'password'          => 'soma2026!',
                'email_verified_at' => now(),
            ]
        );

        $this->command->info('Usuario admin creado: admin@somameat.com / soma2026!');
    }
}
