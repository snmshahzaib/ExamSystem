<?php

namespace Database\Seeders;

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
            'name' => 'Teacher',
            'email' => 'teacher@teacher.com',
            'role' => 'teacher',
            'email_verified_at'=> '2022-06-30 23:41:05',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Student',
            'email' => 'student@student.com',
            'role' => 'student',
            'email_verified_at'=> '2022-06-30 23:41:05',
            'password' => Hash::make('12345678'),
        ]);
    }
}
