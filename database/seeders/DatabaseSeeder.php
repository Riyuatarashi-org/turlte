<?php

declare( strict_types=1 );

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment('local')) {
            UserFactory::new()
                       ->create([
                           'name'              => 'Admin',
                           'email'             => 'dev@moee.fr',
                           'email_verified_at' => now(),
                           'password'          => Hash::make('admin'),
                       ]);
        }
    }
}
