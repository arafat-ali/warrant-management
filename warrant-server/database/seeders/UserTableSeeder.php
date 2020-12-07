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
                    'name' => 'Arafat',
                    'name_bangla' => 'আরাফাত',
                    'email' => 'arafat@gmail.com',
                    'role_id'=>1,
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd'
                ],
                [
                    'name' => 'Susmoy',
                    'name_bangla' => 'সুস্ময়',
                    'email' => 'susmoy@gmail.com',
                    'role_id'=>2,
                    'password' => Hash::make('123456'),
                    'bp' => 1234,
                    'mobile' => '01741234567',
                    'gender' => 1,
                    'district' => 1,
                    'thana' => 1,
                    'outpost' => 'abcd'
                ],
            ]
        );
    }
}
