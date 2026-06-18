<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@dny-filterindo.co.id',
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('4dm1nFilter1ndo2026!'),
            ]
        );
    }
}