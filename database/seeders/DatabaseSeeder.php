<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'xolani.mgcoyi@email.com',
            'password' => Hash::make('123456'),
            'admin' => 1,
            'email_verified_at' => now(),
        ]);

        User::factory()
            ->count(2)
            ->hasPosts(3)
            ->create();
//         \App\Models\User::factory(2)->create();
    }
}
