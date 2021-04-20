<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Db::table('users')->insert([
            'name' => 'Trần Hoàng',
            'gender' => 1,
            'email' => 'tranhoang70@gmail.com',
            'phone_number' => '012345678',
            'password' => Hash::make('user123'),
        ]);

        Db::table('admins')->insert([
            'fullname' => 'Trần Hoàng',
            'email' => 'tranhoang750@gmail.com',
            'username' => 'admin123',
            'phone_number' => '012345678',
            'password' => Hash::make('admin123'),
        ]);

    }
}