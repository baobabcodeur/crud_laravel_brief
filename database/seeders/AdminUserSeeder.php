<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',  // Assurez-vous que la colonne 'role' existe
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
