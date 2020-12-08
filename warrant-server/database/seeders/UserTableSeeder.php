<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Court Inspector',
                    'name_bangla' => 'কোর্ট ইন্সপেক্টর',
                    'email' => 'ci@gmail.com',
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd',
                    'role_id'=>1
                ],
                [
                    'name' => 'Police Super',
                    'name_bangla' => 'পুলিশ সুপার',
                    'email' => 'sp@gmail.com',
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd',
                    'role_id'=>2,
                ],
                [
                    'name' => 'DIG',
                    'name_bangla' => 'ডিআইজি',
                    'email' => 'dig@gmail.com',
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd',
                    'role_id'=>3,
                ],
                [
                    'name' => 'OC',
                    'name_bangla' => 'ওসি',
                    'email' => 'oc@gmail.com',
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd',
                    'role_id'=>4,
                ],
                [
                    'name' => 'SI',
                    'name_bangla' => 'এসআই',
                    'email' => 'si@gmail.com',
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd',
                    'role_id'=>5,
                ],
                [
                    'name' => 'ASI',
                    'name_bangla' => 'এসএসআই',
                    'email' => 'asi@gmail.com',
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd',
                    'role_id'=>6,
                ],
            ]
        );
    }
}
