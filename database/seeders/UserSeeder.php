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
            'name' => 'Soden',
            'userName' => 'SodenS',
            'role' => 'kades',
            'password' => Hash::make('Soden123'),
            'created_at' => '2023-12-09 10:30:27',
            'updated_at' => '2023-12-09 10:30:27'
        ]);
    }
}
