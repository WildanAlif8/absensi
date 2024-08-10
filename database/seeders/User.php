<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'wilipstar',
            'password' => Hash::make('admin123'),
            'posisi' => 'Manajer',
            'gaji' => '4000.00',
            'role' => 'admin',
        ]);
    }
}
