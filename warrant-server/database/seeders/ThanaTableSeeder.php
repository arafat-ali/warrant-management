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
                    'name' => 'হাটহাজারি',
                    'district_id' => 1
                ],
                [
                    'name' => 'পটিয়া',
                    'district_id' => 1
                ],
                [
                    'name' => 'সাতকানিয়া',
                    'district_id' => 1
                ],
                [
                    'name' => 'আনোয়ারা',
                    'district_id' => 1
                ],
                [
                    'name' => 'রাউজান',
                    'district_id' => 1
                ],
            ]
        );
    }
}
