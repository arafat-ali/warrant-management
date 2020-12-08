<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thanas')->insert(
            [
                [
                    'name' => 'চট্রগ্রাম কোতয়ালি থানা', 
                    'district_id' => 1
                ],
                [
                    'name' => 'চকবাজার থানা',
                    'district_id' => 1
                ],
                [
                    'name' => 'হালিশহর থানা',
                    'district_id' => 1
                ],
                [
                    'name' => 'পাঁচলাইশ থানা',
                    'district_id' => 1
                ],
            ]
        );
    }
}
