<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            
        // DB::table('users')->insert([
        //     'name' => 'Admin',
        //     'email' => 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('admin'),
        //     'two_factor_secret' => null,
        //     'two_factor_recovery_codes' => null,
        //     'remember_token' => Str::random(10),
        //     'profile_photo_path' => null,
        //     'current_team_id' => null,
        // ]);

        // \App\Models\User::factory(50)->create();
        // Product::factory(50)->create();




    }
}
