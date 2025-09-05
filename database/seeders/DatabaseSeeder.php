<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roleAdmin = Role::query()->create(['name' => 'admin']);
        $roleEditor = Role::query()->create(['name' => 'editor']);
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $user->roles()->attach($roleAdmin);
        User::factory(10)->create()->each(function ($user) use ($roleEditor) {
            $user->roles()->attach($roleEditor);
        });
    }
}
