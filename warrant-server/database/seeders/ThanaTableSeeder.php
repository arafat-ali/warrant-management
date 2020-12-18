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
                    'name' => 'সাতকানিয়া থানা',
                    'district_id' => 1
                ],
                [
                    'name' => 'পটিয়া থানা',
                    'district_id' => 1
                ],
                [
                    'name' => 'হাটহাজারি থানা',
                    'district_id' => 1
                ],
                [
                    'name' => 'আনোয়ারা থানা',
                    'district_id' => 1
                ],
                [
                    'name' => 'রাউজান থানা',
                    'district_id' => 1
                ],
            ]
        );
    }
}
