<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Deepjyoti Baishya',
                'role_id' => 1,
                'role_name' => 'admin',
                'email' => 'deepjyoti120281@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Deep1234'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
