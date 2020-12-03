<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crime_sub_categories')->insert(
            [
                [
                    'name' => 'সিধেঁল চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'গাড়ী চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'গবাদি পশু চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'গাছ চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'ট্রান্স/তার চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'বসত গৃহে চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'অন্যান্য চুরি',
                    'category_id' => 4
                ],
                [
                    'name' => 'ধর্ষণ',
                    'category_id' => 8
                ],
                [
                    'name' => 'গনধর্ষণ',
                    'category_id' => 8
                ],
                [
                    'name' => 'অপহরণ',
                    'category_id' => 8
                ],
                [
                    'name' => 'যৌতুকের জন্য খুন',
                    'category_id' => 8
                ],
                [
                    'name' => 'যৌতুক',
                    'category_id' => 8
                ],
                [
                    'name' => 'অন্যান্য কারনে',
                    'category_id' => 8
                ]
            ]
        );
    }
}
