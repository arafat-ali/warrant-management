<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('crime_categories')->insert(
            [
                [
                    'name' => 'ডাকাতি',
                ],
                [
                    'name' => 'খুনসহ ডাকাতি',
                ],
                [
                    'name' => 'দস্যুতা',
                ],
                [
                    'name' => 'চুরি',
                ],
                [
                    'name' => 'খুন',
                ],
                [
                    'name' => 'দাঙ্গা',
                ],
                [
                    'name' => 'দাঙ্গা সহ খুন',
                ],
                [
                    'name' => 'নারী ও শিশু নির্যাতন',
                ],
                [
                    'name' => 'শিশু নির্যাতন',
                ],
                [
                    'name' => 'অপহরণ(দঃবিঃ)',
                ],
                [
                    'name' => 'এসিড নিক্ষেপ',
                ],
                [
                    'name' => 'অস্ত্র আইন',
                ],
                [
                    'name' => 'বিস্ফোরক',
                ],
                [
                    'name' => 'মাদকদ্রব্য',
                ],
                [
                    'name' => 'চোরা চালান',
                ],
                [
                    'name' => 'পুলিশ আঃ',
                ],
                [
                    'name' => 'দ্রুত বিচার',
                ],
                [
                    'name' => 'চাঁদাদাবী',
                ],
                [
                    'name' => 'কিশোর গ্যাং',
                ],
                [
                    'name' => 'জংগি সংক্রান্ত',
                ],
                [
                    'name' => 'বিষেশ ক্ষমতা',
                ],
                [
                    'name' => 'মানব পাচার',
                ],
                [
                    'name' => 'মানিলন্ডারিং',
                ],
                [
                    'name' => 'সড়ক দূর্ঘটনা',
                ],
                [
                    'name' => 'জালনোট',
                ],
                [
                    'name' => 'আইসিটি এ্যাক্ট',
                ],
                [
                    'name' => 'ডিজিটাল',
                ],
                [
                    'name' => 'পর্নোগ্রাফী',
                ],
                [
                    'name' => 'পার্সর্পোট',
                ],
                [
                    'name' => 'অগ্নিসংযোগ',
                ],
                [
                    'name' => 'জালিয়াতি',
                ],
                [
                    'name' => 'প্রতারণা',
                ],
                [
                    'name' => 'অন্যান্য',
                ],
                
                
            ]
        );
    }
}
