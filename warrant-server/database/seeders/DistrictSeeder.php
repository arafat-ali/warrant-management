<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert(
            [
                [
                    'name' => 'চট্রগ্রাম জেলা',
                ],
                [
                    'name' => 'বান্দরবান জেলা',
                ],
                [
                    'name' => 'রাঙ্গামাটি জেলা',
                ],
                [
                    'name' => 'খাগড়াছড়ি জেলা',
                ],
            ]
        );
    }
}
