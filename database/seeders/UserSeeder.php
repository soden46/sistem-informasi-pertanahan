<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nadila',
            'userName' => 'Nadila',
            'role' => 'admin',
            'password' => Hash::make('Nadila123'),
            'created_at' => '2023-12-09 10:30:27',
            'updated_at' => '2023-12-09 10:30:27'
        ]);
    }
}
