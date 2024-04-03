<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '+998555555555',
            'city' => 'tashkent',
            'state' => 'Yunusobod',
            'address' => '12 kvartal',
            'home' => '40',
            'role' => '1',
            'password' => Hash::make('password'),
        ]);
    }
}
