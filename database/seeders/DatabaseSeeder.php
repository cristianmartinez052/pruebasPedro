<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(5)->create();

         \App\Models\User::factory()->create([
             'name' => 'Pedro Javier',
             'email' => 'pedrojavier@admin.com',
             'email_verified_at' => now(),
             'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
             'two_factor_secret' => null,
             'two_factor_recovery_codes' => null,
             'remember_token' => Str::random(10),
             'profile_photo_path' => null,
             'current_team_id' => null,
         ]);


         Article::factory(10)->create();
    }
}
