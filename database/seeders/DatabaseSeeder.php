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
        User::firstOrCreate([
            'email' => 'support@playlisters.net'
        ], [
            'password' => Hash::make('DaudzNaudas123$'),
            'name' => 'Playlisters Support',
        ]);
    }
}
