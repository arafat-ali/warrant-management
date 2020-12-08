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
                ],
                [
                    'name' => 'পটিয়া',
                ],
                [
                    'name' => 'সাতকানিয়া',
                ],
                [
                    'name' => 'আনোয়ারা',
                ],
                [
                    'name' => 'রাউজান',
                ],
            ]
        );
    }
}
