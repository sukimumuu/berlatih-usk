<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'level' => 'admin',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'level' => 'user',
            'password' => Hash::make('user'),
        ]);
    }
}
