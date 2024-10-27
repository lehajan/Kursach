<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Review;
use App\Models\Subscription;
use App\Models\Trainer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'name'=>'admin',
            'email'=>'admin@ya.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);
        Subscription::factory(10)->create();
        Trainer::factory(3)->create();
        Review::factory(10)->create();


// \App\Models\User::factory()->create([
// 'name' => 'Test User',
// 'email' => 'test@example.com',
// ]);
    }
}
