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
                    'email' => 'arafat@gmail.com',
                    'role_id'=>1,
                    'password' => Hash::make('123456')
                ],
                [
                    'name' => 'Susmoy',
                    'email' => 'susmoy@gmail.com',
                    'role_id'=>2,
                    'password' => Hash::make('123456')
                ],
            ]
        );
    }
}
