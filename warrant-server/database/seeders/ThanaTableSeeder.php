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
                    'name' => 'কোতোয়ালি',
                ],
                [
                    'name' => 'বায়েজিদ',
                ],
                [
                    'name' => 'পাঁচলাইশ',
                ],
            ]
        );
    }
}
