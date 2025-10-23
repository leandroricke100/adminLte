<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // cria papéis
        $roleAdmin  = Role::firstOrCreate(['name' => 'admin']);
        $roleEditor = Role::firstOrCreate(['name' => 'editor']);

        if (app()->environment('local')) {
            // Somente em DEV: usa factories (precisa de Faker)
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
            $user->roles()->attach($roleAdmin);

            User::factory(10)->create()->each(function ($u) use ($roleEditor) {
                $u->roles()->attach($roleEditor);
            });
        } else {
            // PRODUÇÃO: cria um admin fixo sem Faker
            $user = User::firstOrCreate(
                ['email' => 'admin@seu-dominio.com'],
                ['name' => 'Admin', 'password' => Hash::make('TroqueEssaSenha!')]
            );
            $user->roles()->syncWithoutDetaching([$roleAdmin->id]);
        }
    }
}
